<?php
$poster = $Poster->all();
?>
<h3>目前位置:首頁>分類網誌><span id="span">健康新知</span></h3>
<div class="container" style="width: 80%;display:flex;justify-content:center" id="container">
    <fieldset style="width: 30%;">
        <legend>分類網誌</legend>
        <div>
            <a class="type-item" data-id="1">健康新知</a>
        </div>
        <div>
            <a class="type-item" data-id="2">菸害防制</a>
        </div>
        <div>
            <a class="type-item" data-id="3">癌症防治</a>
        </div>
        <div>
            <a class="type-item" data-id="4">慢性病防治</a>
        </div>
    </fieldset>
    <fieldset style="width: 60%;">
        <legend>文章列表</legend>
        <div id="item"></div>
    </fieldset>
</div>
<div id="news"></div>
<script>
    getlist(1);
    $(".type-item").on('click', function() {
        $("#span").text($(this).text());
        let type = $(this).data("id");
        getlist(type);
    })

    function getlist(type) {
        $.post("./api/get_list.php", {
            type
        }, (res) => {
            $("#item").html(res);
        })
    }

    function showitem(id) {
        $.post("./api/get_item.php", {
            id
        }, (res) => {
            // console.log(id);
            $("#container").hide();
            $("#news").html(res);
        })
    }
</script>