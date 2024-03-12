<style>
    table {
        width: 80%;
        margin: auto;
        text-align: center;
    }
</style>
<form action="./api/edit_poster.php" method="post">
    <table>
        <tr>
            <td style="width: 10%;">編號</td>
            <td style="width: 60%;">標題</td>
            <td style="width: 10%;">顯示</td>
            <td style="width: 10%;">刪除</td>
        </tr>
        <?php
        $total = $Poster->count();
        $div = 3;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $posters = $Poster->all("limit $start,$div");
        foreach ($posters as $idx => $poster) {
        ?>
            <tr>
                <td style="background-color: lightgray;"><?= $idx + 1 + $start; ?></td>
                <td><?= $poster['title']; ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $poster['id']; ?>" <?= ($poster['sh'] == 1) ? 'checked' : ''; ?>></td>
                <td><input type="checkbox" name="del[]" value="<?= $poster['id']; ?>" id=""></td>
                <input type="hidden" name="id[]" value="<?= $poster['id']; ?>">
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
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
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
</form>