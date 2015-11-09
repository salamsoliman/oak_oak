<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<div class="alert alert-block mt10">
  <ul class="mt5">
<li>1, can treat delivery order delivery, delivery can set the consignor and consignee information, fill in some of the memo information, select the corresponding logistics service and print invoices. </li>
<li>2, has been set for the delivery of the order, you can continue to edit the last shipment information. </li>
<li>3, if the logistics and other reasons caused by the buyer can not receive the goods in time, you can use the time to delay the delivery of the system to delay the delivery time of the system. </li>
  </ul>
</div>
<form method="get" action="index.php" target="_self">
  <table class="search-form">
    <input type="hidden" name="act" value="store_deliver" />
    <input type="hidden" name="op" value="index" />
    <?php if ($_GET['state'] !='') { ?>
    <input type="hidden" name="state" value="<?php echo $_GET['state']; ?>" />
    <?php } ?>
    <tr>
      <td></td>
      <th><?php echo $lang['store_order_add_time'];?></th>
      <td class="w240"><input type="text" class="text w70" name="query_start_date" id="query_start_date" value="<?php echo $_GET['query_start_date']; ?>" /><label class="add-on"><i class="icon-calendar"></i></label>
        &nbsp;&#8211;&nbsp;
        <input id="query_end_date" class="text w70" type="text" name="query_end_date" value="<?php echo $_GET['query_end_date']; ?>" /><label class="add-on"><i class="icon-calendar"></i></label></td>
      <th><?php echo $lang['store_order_buyer'];?></span></th>
      <td class="w100"><input type="text" class="text w80" name="buyer_name" value="<?php echo trim($_GET['buyer_name']); ?>" /></td>
      <th><?php echo $lang['store_order_order_sn'];?></th>
      <td class="w160"><input type="text" class="text w150" name="order_sn" value="<?php echo trim($_GET['order_sn']); ?>" /></td>
      <td class="w70 tc"><label class="submit-border">
          <input type="submit" class="submit"value="<?php echo $lang['store_order_search'];?>" />
        </label></td>
    </tr>
  </table>
</form>
<table class="ncsc-table-style order deliver">
  <?php if (is_array($output['order_list']) and !empty($output['order_list'])) { ?>
  <?php foreach($output['order_list'] as $order_id => $order) {?>
  <tbody>
    <tr>
      <td colspan="21" class="sep-row"></td>
    </tr>
    <tr>
      <th colspan="21"><span class="ml5"><?php echo $lang['store_order_order_sn'].$lang['nc_colon'];?><strong><?php echo $order['order_sn']; ?></strong></span><span><?php echo $lang['store_order_add_time'].$lang['nc_colon'];?><em class="goods-time"><?php echo date("Y-m-d H:i:s",$order['add_time']); ?></em></span>
        <?php if (!empty($order['extend_order_common']['shipping_time'])) {?>
        <span><?php echo '发货时间'.$lang['nc_colon'];?><em class="goods-time"><?php echo date("Y-m-d H:i:s",$order['extend_order_common']['shipping_time']); }?></em></span> <span class="fr mr10">
        <?php if ($order['shipping_code'] != ''){?>
        <a href="index.php?act=store_deliver&op=search_deliver&order_sn=<?php echo $order['order_sn']; ?>" class="ncsc-btn-mini"><i class="icon-compass"></i><?php echo $lang['store_order_show_deliver'];?></a>
        <?php }?>
        <a href="index.php?act=store_order_print&order_id=<?php echo $order['order_id'];?>" target="_blank"  class="ncsc-btn-mini" title="<?php echo $lang['store_show_order_printorder'];?>"/><i class="icon-print"></i><?php echo $lang['store_show_order_printorder'];?></a></span></th>
    </tr>
    <?php foreach($order['extend_order_goods'] as $k => $goods) { ?>
    <tr>
      <td class="bdl w10"></td>
      <td class="w50"><div class="pic-thumb"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$goods['goods_id']));?>" target="_blank"><img src="<?php echo cthumb($goods['goods_image'],60,$goods['store_id']); ?>" /></a></div></td>
      <td class="tl"><dl class="goods-name">
          <dt><a target="_blank" href="<?php echo urlShop('goods','index',array('goods_id'=>$goods['goods_id']));?>"><?php echo $goods['goods_name']; ?></a></dt>
          <dd><strong>￥<?php echo $goods['goods_price']; ?></strong>&nbsp;x&nbsp;<em><?php echo $goods['goods_num']; ?></em>件</dd>
        </dl></td>
      <?php if ((count($order['extend_order_goods']) > 1 && $k == 0) || (count($order['extend_order_goods']) == 1)){?>
      <td class="bdl bdr order-info w500" rowspan="<?php echo count($order['extend_order_goods']);?>"><dl>
          <dt><?php echo $lang['store_deliver_buyer_name'].$lang['nc_colon'];?></dt>
          <dd><?php echo $order['buyer_name']; ?> <span member_id="<?php echo $order['buyer_id'];?>"></span>
            <?php if(!empty($order['extend_member']['member_qq'])){?>
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $order['extend_member']['member_qq'];?>&site=qq&menu=yes" title="QQ: <?php echo $order['extend_member']['member_qq'];?>"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $order['extend_member']['member_qq'];?>:52" style=" vertical-align: middle;"/></a>
            <?php }?>
            <?php if(!empty($order['extend_member']['member_ww'])){?>
            <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo $order['extend_member']['member_ww'];?>&site=cntaobao&s=2&charset=<?php echo CHARSET;?>" class="vm" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo $order['extend_member']['member_ww'];?>&site=cntaobao&s=2&charset=<?php echo CHARSET;?>" alt="Wang Wang" style=" vertical-align: middle;"/></a>
            <?php }?>
          </dd>
        </dl>
        <dl>
          <dt><?php echo 'Consignee'.$lang['nc_colon'];?></dt>
          <dd>
            <div class="alert alert-info m0">
              <p><i class="icon-user"></i><?php echo $order['extend_order_common']['reciver_name']?><span class="ml30" title="<?php echo '电话';?>"><i class="icon-phone"></i><?php echo $order['extend_order_common']['reciver_info']['phone'];?></span></p>
              <p class="mt5" title="<?php echo $lang['store_deliver_buyer_address'];?>"><i class="icon-map-marker"></i><?php echo $order['extend_order_common']['reciver_info']['address'];?></p>
              <?php if ($order['extend_order_common']['order_message'] != '') {?>
              <p class="mt5" title="<?php echo $lang['store_deliver_buyer_address'];?>"><i class="icon-map-marker"></i><?php echo $order['extend_order_common']['order_message'];?></p>
              <?php } ?>
            </div>
          </dd>
        </dl>
        <dl>
          <dt><?php echo $lang['store_deliver_shipping_amount'].$lang['nc_colon'];?> </dt>
          <dd>
            <?php if (!empty($order['shipping_fee']) && $order['shipping_fee'] != '0.00'){?>
            ￥<?php echo $order['shipping_fee'];?>
            <?php }else{?>
            <?php echo $lang['nc_common_shipping_free'];?>
            <?php }?>
            <?php if (empty($order['lock_state'])) {?>
            <?php if ($order['order_state'] == ORDER_STATE_PAY) {?>
            <span><a href="index.php?act=store_deliver&op=send&order_id=<?php echo $order['order_id'];?>" class="ncsc-btn-mini ncsc-btn-green fr"><i class="icon-truck"></i><?php echo $lang['store_order_send'];?></a></span>
            <?php } elseif ($order['order_state'] == ORDER_STATE_SEND){?>
            <span>
            <a href="javascript:void(0)" class="ncsc-btn-mini ncsc-btn-orange ml5 fr" uri="index.php?act=store_deliver&op=delay_receive&order_id=<?php echo $order['order_id']; ?>" dialog_width="480" dialog_title="延迟收货" nc_type="dialog" dialog_id="seller_order_delay_receive" id="order<?php echo $order['order_id']; ?>_action_delay_receive" /><i class="icon-time"></i></i>延迟收货</a>
            <a href="index.php?act=store_deliver&op=send&order_id=<?php echo $order['order_id'];?>" class="ncsc-btn-mini ncsc-btn-acidblue fr"><i class="icon-edit"></i><?php echo $lang['store_deliver_modify_info'];?></a>
            </span>
            <?php }?>
            <?php }?>
          </dd>
        </dl></td>
      <?php }?>
    </tr>
    <?php }?>
    <?php } } else { ?>
    <tr>
      <td colspan="21" class="norecord"><div class="warning-option"><i class="icon-warning-sign"></i><span><?php echo $lang['no_record'];?></span></div></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <?php if (!empty($output['order_array'])) { ?>
    <tr>
      <td colspan="21"><div class="pagination"><?php echo $output['show_page']; ?></div></td>
    </tr>
    <?php } ?>
  </tfoot>
</table>
<script charset="utf-8" type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<script type="text/javascript">
$(function(){
    $('#query_start_date').datepicker({dateFormat: 'yy-mm-dd'});
    $('#query_end_date').datepicker({dateFormat: 'yy-mm-dd'});
});
</script> 
