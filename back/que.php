<fieldset>
    <legend>新增問卷</legend>
    <form action="" method="post">
        <div style="display: flex;">
            <div>問卷名稱</div>
            <div><input type="text" name="name" id=""></div>
        </div>
    </form>
    <div id="opt">
        選項
        <input type="text" name="opt[]" id="">
        <input type="button" value="更多" onclick="more()">
    </div>
    <div>
        <input type="button" value="新增">|
        <input type="button" value="清空">
    </div>
</fieldset>
<script>
    function more(){
        let content=
        `
        <div id="opt">
        選項
        <input type="text" name="opt[]" id="">
    </div>
        `
        $("#opt").before(content);
    }
</script>