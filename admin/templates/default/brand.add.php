<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['brand_index_brand'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=brand&op=brand"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_new'];?></span></a></li>
        <li><a href="index.php?act=brand&op=brand_apply"><span><?php echo $lang['brand_index_to_audit'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="brand_form" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2 nobdb">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation"><?php echo $lang['brand_index_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="brand_name" id="brand_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><?php echo $lang['brand_index_class'];?>: </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform" id="gcategory"><input type="hidden" value="" name="class_id" class="mls_id">
            <input type="hidden" value="" name="brand_class" class="mls_name">
            <select class="class-select">
              <option value="0"><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['gc_list'])){ ?>
              <?php foreach($output['gc_list'] as $k => $v){ ?>
              <?php if ($v['gc_parent_id'] == 0) {?>
              <option value="<?php echo $v['gc_id'];?>"><?php echo $v['gc_name'];?></option>
              <?php } ?>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips"><?php echo $lang['brand_index_class_tips'];?></td>
        </tr>

            <tr>
          <td colspan="2" class="required">选择国家: </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <select name="brand_count">
               <?php foreach($output['gc_count'] as $k => $v){ ?>
              <option value="<?php echo $v['count_id'];?>"><?php echo $v['count_name'];?></option>
              <?php }?>
          </select>
          </td> 
        </tr>


        <tr>
          <td colspan="2" class="required"><?php echo $lang['brand_index_pic_sign'];?>: </td>
        </tr>
        <tr class="noborder" style="display:none"> 
          <td class="vatop rowform"><span class="type-file-show"> <img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview" style="display: none;"><img id="view_img"></div>
            </span> <span class="type-file-box">
            <input type='text' name='brand_pic' id='brand_pic' class='type-file-text' />
            <input type='button' name='button' id='button' value='' class='type-file-button' />
            <input name="_pic" type="file" class="type-file-file" id="_pic" size="30" hidefocus="true" />
            </span></td>
          <td class="vatop tips"><?php echo $lang['brand_index_upload_tips'].$lang['brand_add_support_type'];?>gif,jpg,png</td>
        </tr>


        <tr class="noborder">
          <td class="vatop rowform"><input id="site_name" name="site_name" value="<?php echo $output['list_setting']['site_name'];?>" class="txt" type="text" /></td>
          <td class="vatop tips"><span class="vatop rowform"><?php echo $lang['web_name_notice'];?></span></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="site_logo">小图:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$output['brand_array']['brand_pic_sm']; ?>"></div>
            </span>
            <span class="type-file-box">
            <input type='text' name='textfield' id='textfield1' class='type-file-text' />
            <input type='button' name='button' id='button1' value='' class='type-file-button' />
            <input name="site_logo" type="file" class="type-file-file" id="site_logo" size="30" hidefocus="true" nc_type="change_site_logo">
            </span></td>
          <td class="vatop tips"><span class="vatop rowform">150px * 50px</span></td>
        </tr>

        <tr>
          <td colspan="2" class="required"><label for="site_logo">中图:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <span class="type-file-show">
          <img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview">
            <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$output['brand_array']['brand_pic']; ?>">
            </div>
            </span>
            <span class="type-file-box">
            <input type='text' name='textfield2' id='textfield2' class='type-file-text' />
            <input type='button' name='button2' id='button2' value='' class='type-file-button' />
            <input name="member_logo" type="file" class="type-file-file" id="member_logo" size="30" hidefocus="true" nc_type="change_member_logo">
            </span></td>
        <td class="vatop tips"><span class="vatop rowform">233px * 195px</span></td>
        </tr>
        <!-- 商家中心logo -->
        <tr>
          <td colspan="2" class="required"><label for="seller_center_logo">大图:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <span class="type-file-show">
          <img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview">
            <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$output['brand_array']['brand_pic_pc']; ?>">
            </div>
            </span><span class="type-file-box">
            <input type='text' name='textfield3' id='textfield3' class='type-file-text' />
            <input type='button' name='button' id='button1' value='' class='type-file-button' />
            <input name="seller_center_logo" type="file" class="type-file-file" id="seller_center_logo" size="30" hidefocus="true" nc_type="change_seller_center_logo">
            </span></td>
          <td class="vatop tips"><span class="vatop rowform">470px * 258px</span></td>
        </tr>
        <!-- 商家中心logo -->







        <tr>
          <td colspan="2" class="required"><?php echo $lang['brand_add_if_recommend'];?>: </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="brand_recommend1" class="cb-enable"><span><?php echo $lang['nc_yes'];?></span></label>
            <label for="brand_recommend0" class="cb-disable selected"><span><?php echo $lang['nc_no'];?></span></label>
            <input id="brand_recommend1" name="brand_recommend" <?php if($output['brand_array']['brand_recommend'] == '1'){ ?>checked="checked"<?php } ?>  value="1" type="radio">
            <input id="brand_recommend0" name="brand_recommend" <?php if($output['brand_array']['brand_recommend'] == '0'){ ?>checked="checked"<?php } ?> value="0" type="radio"></td>
          <td class="vatop tips"><?php echo $lang['brand_index_recommend_tips'];?></td>
        </tr>


<tr>
          <td colspan="2" class="required">品牌简介: </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
             <textarea class="tarea" id="brand_about" name="brand_about"></textarea>
          <td class="vatop tips">请填写品牌简述</td>
        </tr>



        <tr>
          <td colspan="2" class="required"><?php echo $lang['nc_sort'];?>: </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="0" name="brand_sort" id="brand_sort" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['brand_add_update_sort'];?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/ajaxfileupload/ajaxfileupload.js"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.Jcrop/jquery.Jcrop.js"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/jquery.Jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" id="cssfile2" />
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/common_select.js" charset="utf-8"></script> 


<script type="text/javascript">
$(function(){
    var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
  $(textButton).insertBefore("#change_default_pic");
  $("#change_default_pic").change(function(){
  $("#textfield1").val($("#change_default_pic").val());
  });
});
</script>




<script type="text/javascript">
// 模拟网站LOGO上传input type='file'样式
$(function(){
  $("#site_logo").change(function(){
    $("#textfield1").val($(this).val());
  });
  $("#member_logo").change(function(){
    $("#textfield2").val($(this).val());
  });
  $("#seller_center_logo").change(function(){
    $("#textfield3").val($(this).val());
  });
// 上传图片类型
$('input[class="type-file-file"]').change(function(){
  var filepatd=$(this).val();
  var extStart=filepatd.lastIndexOf(".");
  var ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();   
    if(ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){
      alert("<?php echo $lang['default_img_wrong'];?>");
        $(this).attr('value','');
      return false;
    }
  });
$('#time_zone').attr('value','<?php echo $output['list_setting']['time_zone'];?>'); 
});
</script>


<script>
//裁剪图片后返回接收函数
function call_back(picname){
	$('#brand_pic').val(picname);
	$('#view_img').attr('src','<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND;?>/'+picname);
}
$(function(){
	$("#submitBtn").click(function(){
	    if($("#brand_form").valid()){
	     $("#brand_form").submit();
		}
	});


	$('input[class="type-file-file"]').change(uploadChange);
	function uploadChange(){
		var filepatd=$(this).val();
		var extStart=filepatd.lastIndexOf(".");
		var ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();		
		if(ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){
			alert("file type error");
			$(this).attr('value','');
			return false;
		}
		if ($(this).val() == '') return false;
		ajaxFileUpload();
	}
	function ajaxFileUpload()
	{
		$.ajaxFileUpload
		(
			{
				url:'index.php?act=common&op=pic_upload&form_submit=ok&uploadpath=<?php echo ATTACH_BRAND;?>',
				secureuri:false,
				fileElementId:'_pic',
				dataType: 'json',
				success: function (data, status)
				{
					if (data.status == 1){
						ajax_form('cutpic','<?php echo $lang['nc_cut'];?>','index.php?act=common&op=pic_cut&type=brand&x=150&y=50&resize=1&ratio=3&url='+data.url,690);
					}else{
						alert(data.msg);
					}$('input[class="type-file-file"]').bind('change',uploadChange);
				},
				error: function (data, status, e)
				{
					alert('upload failed');$('input[class="type-file-file"]').bind('change',uploadChange);
				}
			}
		)
	};
	$("#brand_form").validate({
		errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
            brand_name : {
                required : true,
                remote   : {
               	url :'index.php?act=brand&op=ajax&branch=check_brand_name',
                type:'get',
                data:{
                    brand_name : function(){
                        return $('#brand_name').val();
                        },
                    	id  : ''
                    }
                }
            },
            brand_sort : {
                number   : true
            }
        },
        messages : {
            brand_name : {
                required : '<?php echo $lang['brand_add_name_null'];?>',
                remote   : '<?php echo $lang['brand_add_name_exists'];?>'
            },
            brand_sort  : {
                number   : '<?php echo $lang['brand_add_sort_int'];?>'
            }
        }
	});	
});

gcategoryInit('gcategory');
</script> 
