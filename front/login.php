<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td style="width: 150px;background-color:lightgray">帳號</td>
            <td><input type="text" id="acc"></td>
        </tr>
        <tr>
            <td style="width: 150px;background-color:lightgray">密碼</td>
            <td><input type="password" id="pw"></td>
        </tr>
        <tr>
            <td style="width: 150px">
                <button onclick="login()">登入</button>
                <button onclick="reset()">清除</button>
            </td>
            <td style="width: 150px ;text-align:right">
                <a href="?do=forget">忘記密碼</a>|
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function login(){
        $.post("./api/acc_chk.php",{acc:$("#acc").val()},(res)=>{
            if (parseInt(res)>0) {
                $.post("./api/pw_chk.php",{acc:$("#acc").val(),pw:$("#pw").val()},(res)=>{
                    if (parseInt(res)>0) {
                        if ($("#acc").val()=='admin') {
                            location.href='back.php';
                        }else{
                            location.href='index.php';
                        }
                    }else{
                        alert("密碼錯誤");
                        reset()
                    }
                })
            }else{
                alert("查無帳號");
                reset()
            }
        })
    }
    function reset(){
       $("#acc").val("");
       $("#pw").val("");
    }
</script>