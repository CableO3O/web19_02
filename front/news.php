<fieldset>
    <legend>目前位置 : 首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td style="width:30%;text-align:center">標題</td>
            <td style="width:60%;text-align:center">內容</td>
            <td></td>
        </tr>
        <?php
        $total = $Poster->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $poster = $Poster->all(['sh' => 1], "limit $start,$div");
        foreach ($poster as $po) {
        ?>
            <tr>
                <td data-id='<?= $po['id']; ?>' class="tags" style="background-color: lightgray;width:25%;"><?= $po['title']; ?></td>
                <td id="s<?= $po['id']; ?>" style="width:60%;text-align:center"><?= mb_substr($po['text'], 0, 20); ?>...</td>
                <td id="l<?= $po['id']; ?>" style="width:60%;text-align:center;display:none">
                    <div>
                        <?php
                        if (isset($_SESSION['user'])) {
                            if ($Vote->count(['user' => $_SESSION['user'], 'poster_id' => $po['id']]) > 0) {
                                echo "<a onclick='vote({$po['id']})'>收回讚</a>";
                            } else {
                                echo "<a onclick='vote({$po['id']})'>讚</a>";
                            }
                        }
                        ?>
                    </div>
                    <div>
                        <?= $po['text']; ?>
                    </div>
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
            echo  "<a href='?do=news&&p=$prev'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $now) ? 'font-size:24px' : 'font-size:16px';
            echo "<a href='?do=news&&p=$i' style='$size'>$i</a>";
        }
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo  "<a href='?do=news&&p=$next'> > </a>";
        }
        ?>
    </div>
</fieldset>
<script>
    $(".tags").on("click", function() {
        let id = $(this).data('id');
        $("#s" + id).toggle();
        $("#l" + id).toggle();
    })

    function vote(poster_id) {
        $.post("./api/vote.php", {
            poster_id
        }, (res) => {
            location.reload();
        })
    }
</script>