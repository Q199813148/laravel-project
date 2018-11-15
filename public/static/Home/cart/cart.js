//删除多余样式
$('.slideall').remove();

//计算价格函数
var cal = function (){
    var price = 0;
    var num = 0;
    $('input[name="items[]"]:checked').each(function(){
        price += parseFloat($(this).parentsUntil('.bundle-main').find('.J_ItemSum').html());
        num++;
    })
    $('#J_Total').html(price.toFixed(2));
    $('#J_SelectedItemsCount').html(num);
}

//ajax减
$('.min').click(function () {
    obj = $(this);
    //获取现有数量
    var num = $(this).next().val();

    //获取数据库对应id
    var id = $(this).prev().val();
    //禁用
    obj.attr('disabled', 'true');
    $.get('/cart/minus', {id: id, num: num}, function (data) {
        if (data == 1) {
            obj.next().val(parseInt(num) - 1);
            obj.next().next().removeAttr('disabled');
            //计算总金额
            price = obj.parentsUntil('.bundle-main').find('.J_Price').html();
            tprice = (num-1)*price;
            obj.parentsUntil('.bundle-main').find('.J_ItemSum').html(tprice.toFixed(2));
            cal();
            if(num <= 2){
                obj.attr('disabled', 'true');
            }else{
                obj.removeAttr('disabled');
            }
        } else {
            obj.removeAttr('disabled');
        }
    })
})
//ajax加
$('.add').click(function () {
    obj = $(this);
    //获取现有数量
    var num = $(this).prev().val();
    //获取数据库对应id
    var id = $(this).parent('div').find('input[name="cart_id"]').val();
    //获取最大库存数
    var store = $(this).parent('div').find('input[name="store"]').val();
    if(num >= store){
        obj.attr('disabled', 'true');
        return false;
    }
    //禁用
    obj.attr('disabled', 'true');
    $.get('/cart/ajaxadd', {id: id, num: num}, function (data) {
        if (data == 1) {
            obj.prev().val(parseInt(num) + 1);
            obj.removeAttr('disabled');
            obj.prev().prev().removeAttr('disabled');
            //计算总金额
            price = obj.parentsUntil('.bundle-main').find('.J_Price').html();
            tprice = (parseInt(num) + 1)*price;
            obj.parentsUntil('.bundle-main').find('.J_ItemSum').html(tprice.toFixed(2));
            cal();
        } else {
            obj.removeAttr('disabled');
        }
    })
})
//ajax删除
$('.delete').click(function () {
    //获取数据库对应id
    var id = $(this).next().val();
    obj = $(this);

    $.get('/cart/del', {id: id}, function (data) {
        if(data == 1){
            obj.parentsUntil('.bundle-main').remove();
            cal();
        }else{
            return false;
        }
    })
})
//数量修改
$('.text_box').change(function () {
    obj = $(this);
    //获取现有数量
    var num = $(this).val();
    //获取数据库对应id
    var id = $(this).parent('div').find('input[name="cart_id"]').val();
    //获取最大库存数
    var store = $(this).parent('div').find('input[name="store"]').val();
    //减
    min = $(this).prev();
    //加
    add = $(this).next();
    //判断输入框数量
    if(obj.val() <= 1){
        obj.val(1);
        min.attr('disabled', 'true');
        add.removeAttr('disabled');
        num = 1;
    }else if(parseInt(num) >= store) {
        obj.val(store);
        add.attr('disabled', 'true');
        min.removeAttr('disabled');
        num = store;
    }else {
        min.removeAttr('disabled');
        add.removeAttr('disabled');
    }
    $.get('/cart/change',{id:id,num:num},function (data) {
        if(data == 1){
            //计算总金额
            price = obj.parentsUntil('.bundle-main').find('.J_Price').html();
            tprice = (parseInt(num))*price;
            obj.parentsUntil('.bundle-main').find('.J_ItemSum').html(tprice.toFixed(2));
            cal();
        }else{
            console.log('error');
        }
    })

})
//全选
$('.check-all').bind('change',function () {
    if($(this).prop('checked')){
        $(".cart-checkbox :checkbox").each(function () {
            $(this).prop("checked", true);
        });
    }else{
        $(".cart-checkbox :checkbox").each(function () {
            $(this).prop("checked", false);
        });
    }
})
//修改选中重新计算价格
$('.check').change(function () {
    cal();
})
//删除选中
$('.deleteAll').click(function () {
    $('input[name="items[]"]:checked').each(function(){
        id = $(this).parentsUntil('.bundle-main').find('.delete').click();
        $(this).parentsUntil('.bundle-main').remove();
    })
})