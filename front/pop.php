<style>
    .pop{
        background:rgba(51,51,51,0.8); 
        color:#FFF; min-height:100px; 
        width:300px; 
        height: 400px;
        position:fixed; 
        display:none; 
        z-index:9999; 
        overflow:auto;
    }
</style>
<fieldset>
    <legend>目前位置: 首頁 > 人氣文章區</legend>
    <table style="margin: auto;">
        <tr>
            <td style="width: 30%;">標題</td>
            <td style="width: 30%;">內容</td>
            <td style="width: 30%;">人氣</td>
        </tr>
        <?php
        $total = $Poster->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $posters = $Poster->all(['sh' => 1], "limit $start,$div");
        foreach ($posters as $poster) {
        ?>
            <tr>
                <td class="title" data-id="<?= $poster['id']; ?>" style="background-color: lightgray;"><?= $poster['title']; ?></td>
                <td>
                    <div>
                        <?= mb_substr($poster['text'], 0, 10); ?>...
                    </div>
                    <div class="pop" id="p<?= $poster['id']; ?>">
                        <h3 style="color:skyblue"><?= $poster['title']; ?></h3>
                        <pre>
                            <?= $poster['text']; ?>
                        </pre>
                    </div>
                </td>
                <td>
                    <?= $poster['goods']; ?>個人說<img style="width:20px" src="./img/02B03.jpg" alt="">
                    <?php
                        if (isset($_SESSION['user'])) {
                            if ($Vote->count(['user' => $_SESSION['user'], 'poster_id' => $poster['id']]) > 0) {
                                echo "-<a onclick='vote({$poster['id']})'>收回讚</a>";
                            } else {
                                echo "-<a onclick='vote({$poster['id']})'>讚</a>";
                            }
                        }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo  "<a href='?do=pop&&p=$prev'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $now) ? 'font-size:24px' : 'font-size:16px';
            echo "<a href='?do=pop&&p=$i' style='$size'>$i</a>";
        }
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo  "<a href='?do=pop&&p=$next'> > </a>";
        }
        ?>
    </div>
</fieldset>
<script>
    $(".title").hover(
        function () { 
            $(".pop").hide();
            let id=$(this).data("id");
            $("#p"+id).show();
         }
    )
    function vote(poster_id) {
        $.post("./api/vote.php", {
            poster_id
        }, (res) => {
            location.reload();
        })
    }
</script>