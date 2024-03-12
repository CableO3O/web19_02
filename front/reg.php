<fieldset>
    <legend>會員註冊</legend>
    <span style="color:red">請設定您要註冊的帳號及密碼(最常12個字元)</span>
    <table>
        <tr>
            <td style="background-color:lightgray">Step1:登入帳號</td>
            <td><input maxlength="12" type="text" name="" id="acc"></td>
        </tr>
        <tr>
            <td style="background-color:lightgray">Step2:登入密碼</td>
            <td><input maxlength="12" type="password" name="" id="pw"></td>
        </tr>
        <tr>
            <td style="background-color:lightgray">Step3:再次確認密碼</td>
            <td><input maxlength="12" type="password" name="" id="pw2"></td>
        </tr>
        <tr>
            <td style="background-color:lightgray">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick=reg()>註冊</button>
                <button onclick="reset()">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>
<script>
    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }
        if (user.acc!="",user.pw!="",user.pw2!="",user.email!="") {
            if (user.pw==user.pw2) {
                $.post("./api/acc_chk.php",{acc:user.acc},(res)=>{
                    if (parseInt(res)>0) {
                        alert("帳號重複");
                    }else{
                        $.post("./api/reg.php",user,(res)=>{
                            alert("註冊完成，歡迎加入");
                            location.href="?do=login";
                        })
                    }
                })
            }else{
                alert("密碼錯誤");
            }
        }else{
            alert("不可空白");
        }
    }

    function reset() {
        $("#acc").val("");
        $("#pw").val("");
        $("#pw2").val("");
        $("#email").val("");
    }
</script>