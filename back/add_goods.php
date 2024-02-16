<style>
   select{
        border-radius:0;
        padding:5px;
    }
</style>
<h1 class="ct">新增商品</h1>
<table class='all'>
    <tr>
        <td class="ct tt">所屬大分類</td>
        <td class="pp"><select name="big" id="big">
            <option value="0">請選擇一項</option>
        </select></td>
    </tr>
    <tr>
        <td class="ct tt">所屬中分類</td>
        <td class="pp"><select name="mid" id="mid">
            <option value="0">請選擇一項</option>
        </select></td>
    </tr>
    <tr>
        <td class="ct tt">商品編號</td>
        <td class="pp">完成分類後自動分配</td>
    </tr>
    <tr>
        <td class="ct tt">商品名稱</td>
        <td class="pp"><input type="text" name="name" id=""></td>
    </tr>
    <tr>
        <td class="ct tt">商品價格</td>
        <td class="pp"><input type="text" name="price" id=""></td>
    </tr>
    <tr>
        <td class="ct tt">規格</td>
        <td class="pp"><input type="text" name="spec" id=""></td>
    </tr>
    <tr>
        <td class="ct tt">庫存量</td>
        <td class="pp"><input type="number" name="stock" id=""></td>
    </tr>
    <tr>
        <td class="ct tt">商品圖片</td>
        <td class="pp"><input type="file" name="img" id=""></td>
    </tr>
    <tr>
        <td class="ct tt">商品介紹</td>
        <td class="pp"><textarea name="intro" id="" cols="30" rows="10"></textarea></td>
    </tr>
</table>
<script>
    let Big = $('#big');
    let Mid = $('#mid');
    function getBig(){
        $.ajax({
            type:'post',
            url:'./api/get.php',
            data:{
                'table':'Type',
                'big_id':0,
            },
            dataType:'json',
            success:function(res){
// console.log(res);
let html='';
$.each(res,(key,big)=>{
html+=`
<option value="${big.id}">${big.name}</option>
`
})
Big.append(html);
            }

        })
    }
function getMid(){
    let big_id = Big.val()
    $.ajax({
        type:'post',
        url:'./api/get.php',
        data:{
            'table':'Type',
            big_id
        },
        dataType:'json',
        success:function(res){
            // console.log(res);
            let html='';
$.each(res,(key,mid)=>{
html+=`
<option value="${mid.id}">${mid.name}</option>
`
})
Mid.html(html);
        }
    })
}
    getBig();
    Big.on('change',getMid);
</script>