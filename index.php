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
    $pagesInRange = $paginator->getPagesInRange(1, 12);
    foreach($pagesInRange as $pageNumber){
        echo "<a href='index.php?page=".$pageNumber."'>".$pageNumber." | </a>";
    }
?>
</body>
</html>
