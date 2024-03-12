<h3>請輸入信箱以查詢密碼</h3>
<input type="text" name="email" id="email" style="width: 300px;">
<div id="result"></div>

<button onclick="find()">尋找</button>
<script>
    function find(){
        $.post("./api/forget.php",{email:$("#email").val()},(res)=>{
            $("#result").text(res);
        })
    }
</script>