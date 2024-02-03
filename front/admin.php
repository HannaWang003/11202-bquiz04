<form id="chkAdmin">
<table class="all">
    <tr>
        <td class="ct tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="ct tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="ct tt">驗證碼</td>
        <td class="pp">
            <span id="chk"></span>
            <input type="text" name="chkans" id="chkans">
        </td>
    </tr>
</table>
<div class="ct"><input type="submit" value="確認"></div>
</form>
<script>
    randnum();
    function randnum(){
        let num1 = Math.floor(Math.random()*90)+10;
        let num2 = Math.floor(Math.random()*90)+10;
        let ans = Number(num1)+Number(num2);
        $.post("./api/chk_admin.php",{ans},function(){
$('#chk').html(`${num1}+${num2}=`);
$('#chkans').val("");
        })
        
    }
    $('#chkAdmin').submit(function(event){
event.preventDefault();
let formData = new FormData(this);
$.ajax({
    type:"POST",
    data:formData,
    url:"./api/chk_admin.php",
    contentType:false,
    processData:false,
    success:function(res){
switch(res){
    case "0":
        alert("帳號或密碼錯誤");
        randnum();
        break;
    case "1":
        alert("驗證碼錯誤");
    randnum();
        break;
        case "2":
        alert("登入");
        break;
}
    }
})
    })

</script>