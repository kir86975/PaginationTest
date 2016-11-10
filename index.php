<?php
/**
 * Created by PhpStorm.
 * User: prg
 * Date: 09.11.2016
 * Time: 16:51
 */
require_once "TestPagination.php";
require_once "TestAdapter.php";

use Test\TestPagination\TestPagination;

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$paginator = TestPagination::getPaginator();
$paginator->setItemCountPerPage(20);
$paginator->setCurrentPageNumber($page);

?>

<html>
<body>
<h1>Example</h1>
<?php if (count($paginator)): ?>
<ul>
<?php foreach ($paginator as $item): ?>
<li><?php echo $item; ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php
    if($page > 1){
        echo "<a href='index.php?page=" . ($page - 1) . "'> << Previous | </a>";
    } else{
        echo '<< Previous | ';
    }

    $pagesInRange = $paginator->getPagesInRange($page - 2, $page + 2);
    $rangeKeys = array_keys($pagesInRange);
    $firstKey = $rangeKeys[0];
    $lastKey = $rangeKeys[count($rangeKeys) - 1];

    if($pagesInRange[$firstKey] > 1){
        echo "<a href='index.php?page=1'>1 | </a>";
    }

    if($pagesInRange[$firstKey] > 2){
        echo "... |";
    }

    foreach($pagesInRange as $pageNumber){
        if($pageNumber == $page){
            echo $page . ' | ';
        } else{
            echo "<a href='index.php?page=".$pageNumber."'>".$pageNumber." | </a>";
        }
    }

    if ($pagesInRange[$lastKey] < $paginator->count() - 1) {
        echo "... | ";
    }

    if ($pagesInRange[$lastKey] < $paginator->count()) {
        echo "<a href='index.php?page=" . $paginator->count() . "'>" . $paginator->count() . " | </a>";
    }

    if($page < $paginator->count()) {
        echo "<a href='index.php?page=" . ($page + 1) . "'> Next >> </a>";
    } else{
        echo " Next >> ";
    }
?>
</body>
</html>
