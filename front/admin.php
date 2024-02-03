<form id="chkAdmin">
<table class="all">
    <tr>
        <td class="ct tt">帳號</td>
        <td class="ct pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="ct tt">密碼</td>
        <td class="ct pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="ct tt">驗證碼</td>
        <td class="ct pp">

            <input type="text" name="chk" id="chk">
        </td>
    </tr>
</table>
<div class="ct"><input type="submit" value="確認"></div>
</form>
<script>
    randnum();
    function randnum(){
        let num1 = (Math.random()*90)+10;
        let num2 = (Math.random()*90)+10;
        
    }

</script>