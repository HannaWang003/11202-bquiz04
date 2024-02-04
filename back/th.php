<h1 class="ct">商品分類</h1>
<div class="ct">
    <span>新增大分類</span>
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    <span>新增中分類</span>
    <select name="big" id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>
<table class="all">
    <tr>
        <td class="tt">流行皮件</td>
        <td class="ct tt">
            <button>修改</button><button>刪除</button>
        </td>
    </tr>
    <tr>
        <td class="ct pp">女用皮件</td>
        <td class="ct pp">
        <button>修改</button><button>刪除</button>
        </td>
    </tr>
</table>
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
                console.log(types)
                $.each(types,function(idx,type){
html+=`
<option value='${type.id}'>${type.name}</option>
`
                })
                $('#bigs').html(html)
            },
            error:function(res){
console.log(res)
            }
        })
    }
    function addType(type){
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
            url:"./api/addType.php",
            success:function(res){
                $('body').load("?do=th");
            }
        })
    }
</script>