$('.user-addresslist').click(function () {
    //点击更换地址
    $(this).addClass('defaultAddr');
    address = $(this).find('.province').html();
    name = $(this).find('.buy-user').html();
    phone = $(this).find('.buy-phone').html();
    $('#holyshit268').find('.province').html(address);
    $('#holyshit268').find('.buy-user').html(name);
    $('#holyshit268').find('.buy-phone').html(phone);
    address_id = $(this).find('input[name="address_id"]').val();
    $('input[name="address"]').val(address_id);
})
//计算总金额
var price = 0;
$('.bundle-last').each(function(){
    price += parseFloat($(this).find('.J_ItemSum').html());

})
$('.pay-sum').html(price.toFixed(2));
$('#J_ActualFee').html(price.toFixed(2));

//提交订单
$('#J_Go').bind('click',function(){
    $('form').submit();
    //防止重复提交
    $(this).unbind('click');
})
//删除地址
function delClick(obj){
    id = $(obj).parent('div').parent('li').find('input[name="address_id"]').val();
    $.get('/personaladdress/del',{id:id},function (data) {
        if(data==1){
            $(obj).parent('div').parent('li').remove();
        }else{
            return false;
        }
    })
}
//设为默认
$(".set-default").click(function(){
    id = $(this).parent('div').parent('li').find('input[name="address_id"]').val();
    $.get('/personaladdress/default',{id:id},function(){
        location.reload();
    },'json')
})