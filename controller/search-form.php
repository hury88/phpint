### GET请求时为搜索模式
### POST请求时为提交表单模式
```php
public function index()
    {
        if(is_get()) {
            $map = array();

            $no = I('get.no','','intval');$no AND $map['id'] = $no-634845;
            $goods_spec = I('get.sku','','intval');$goods_spec AND $map['goods_spec'] = $goods_spec;
            $status = I('get.status','','intval');$status AND $map['status'] = $status;

            $title = I('get.keyword','','trim');$title AND $map['order_param'] = array('like',"%$title%");

            $start = I('get.start','','trim');$start AND $map['created_at'] = array('egt', $start.' 00:00:00');
            $end = I('get.end','','trim');$end AND $map['created_at'] = array('elt', $end.' 23:59:59');
            if($start && $end) {
                $map['created_at'] = array('between', [$start.' 00:00:00', $end.' 23:59:59']);
            } elseif(empty($start) && empty($start)) {
                $ymd = date('Y-m-d');
                $map['created_at'] = array('between', [$ymd.' 00:00:00', $ymd.' 23:59:59']);
            }

            $orders = M('order')->where($map)->order('id desc')->select();

            $total = array_sum(array_column($orders, 'goods_amount'));

            $tostring = array(
                'status' => config('webarr')['order_status'],
                'type' => config('webarr')['goods_spec'],
            );
            return $this->view('index', compact('orders', 'tostring', 'total', 'no', 'goods_spec', 'status', 'title', 'start', 'end'));
        }
        $verify = [
            'goods_id' => ['required', '请选择游戏分区'],
            'goods_spec' => ['required', '请选择游戏分区'],
            'goods_amount' => ['required', '请输入数量'],
            'order_param' => ['need'],
            'extra1' => ['need'],
            'extra2' => ['need'],
        ];

        $form = new VerifyForm($verify, 'post');
        #验证不通过
        if ($form->result()) {
            returnJson(-100, $form->error, $form->field);
        }
        if ($form->goods_amount < 10000) {
            returnJson(-100, '购买数量不能低于10000');
        }

        $goods_spec_arr = config('webarr')['goods_spec'];

        $order = array_merge($form->getInputParameters(), [
            'user_id'  => Person::getUserId(),
            'orderno'  => time().mt_rand(1000, 99999),
            'good_name' => '王者荣耀人气值('.$goods_spec_arr[$form->goods_spec].')',
            'ip' => $form->ip(),
            'created_at' => $form->datetime(),
            'edit_at' => $form->datetime(),
            'status' => 0,#0待处理,1处理中,2已完成,3账号错误,4已取消
        ]);
        $insertId = M('order')->insert($order);

        if($insertId) {
                returnJson(1, lang('order_success'), '/');

        }
        returnJson(-100, lang('order_failed'));
    }
```
