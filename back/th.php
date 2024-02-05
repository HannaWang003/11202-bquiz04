<h1 class="ct">商品分類</h1>
<div class="ct">
    <span>新增大分類</span>
    <input type="text" name="big" id="big">
    <button onclick="save_type('big')">新增</button>
</div>
<div class="ct">
    <span>新增中分類</span>
    <select name="big" id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="save_type('mid')">新增</button>
</div>
<script>
    getbigtype(0)
    function getbigtype(big_id){
        $.ajax({
            type:"GET",
            dataType:"json",
            data:{
                "big_id":0,
            },
            url:"./api/get_types.php",
            success:function(types){
                let html = '';
                // console.log(types)
                $.each(types,function(idx,type){
html+=`
<option value='${type.id}'>${type.name}</option>
`
                })
                $('#bigs').html(html)
            },
            error:function(res){
// console.log(res)
            }
        })
    }
    function save_type(type){
        let name,big_id
        switch(type){
            case "big":
                name = $('#big').val();
                big_id=0;
                break;
            case "mid":
                name = $('#mid').val();
                big_id=$('#bigs').val();
        }
        $.ajax({
            type:"post",
            data:{
                name,
                big_id
            },
            url:"./api/save_type.php",
            success:function(res){
                $('body').load("?do=th");
            }
        })
    }
</script>

<table class="all">
    <?php
$bigs = $Type->all(['big_id'=>0]);
    foreach($bigs as $big){ 

    ?>
    <tr>
        <td class="tt"><?=$big['name']?></td>
        <td class="ct tt"><button onclick="edit(this,<?=$big['id']?>)" >修改</button><button onclick="del(this,'type',<?=$big['id']?>)" >刪除</button></td>
    </tr>
    <?php
$mids = $Type->all(['big_id'=>$big['id']]);
foreach($mids as $mid){
    ?>
    <tr>
        <td class="ct pp"><?=$mid['name']?></td>
        <td class="ct pp"><button onclick="edit(this,<?=$mid['id']?>)" >修改</button><button onclick="del(this,'type',<?=$mid['id']?>)" >刪除</button></td>
  
    </tr>
<?php
}
 }
    ?>
</table>
<script>
function edit(dom,id){
let name = prompt("請輸入您要修改的分類名稱:",`${$(dom).parent().prev().text()}`)
// console.log(name)
if(name!=null){
    $.post('./api/save_type.php',{name,id},function(res){
$(dom).parent().prev().text(name)
    })
}
}
function del(dom,table,id){
$.ajax({
    type:"post",
    data:{
        table,
        id
    },
    url:"./api/del.php",
    success:function(res){
       $(dom).closest('tr').remove();
    }

})
}
</script>