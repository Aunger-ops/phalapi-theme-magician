<?php
$table_color_arr = explode(" ", "red orange yellow olive teal blue violet purple pink grey black");
$semanticPath    = 'https://cdn.bootcss.com/semantic-ui/2.2.2/';
$semanticPath    = '/semantic/'; // 本地
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        <?php echo $projectName; ?>- 在线接口列表
    </title>
    <!-- Favicon -->
    <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!--     <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
 -->    <!-- Argon CSS -->
    <link href="./assets/css/argon.min.css" rel="stylesheet" type="text/css">
    <script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>

    <style type="text/css">
        .col {
            display: none;
        }

        .col.active {
            display: block;
        }
    </style>
</head>

<body>
    <?php
if ($theme == 'fold') {
    ?>
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scroll-wrapper scrollbar-inner" style="position: relative;">
            <div class="scrollbar-inner scroll-content" style="height: 538px; margin-bottom: 0px; margin-right: 0px; max-height: none;">
                <!-- Brand -->
                <div class="sidenav-header align-items-center" id="menu_top">
                    <a class="navbar-brand" href="./">
                        <?php echo $projectName; ?>
                    </a>
                </div>
                <?php
// 总接口数量
    $methodTotal = 0;
    foreach ($allApiS as $namespace => $subAllApiS) {
        foreach ($subAllApiS as $item) {
            $methodTotal += count($item['methods']);
        }
    }
    ?>
                <div class="navbar-inner">
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">
                            接口服务列表(
                            <?php echo $methodTotal; ?>)
                        </span>
                    </h6>
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <!-- Nav items -->
                        <ul class="navbar-nav">

                            <?php
$num = 0;
    foreach ($allApiS as $namespace => $subAllApiS) {
        echo '<li class="nav-item">';
        $subMethodTotal = 0;
        foreach ($subAllApiS as $item) {
            $subMethodTotal += count($item['methods']);
        }
        $namespaceService = str_replace('\\', '_', trim($namespace, '\\'));
        // 每个命名空间下的接口类
        foreach ($subAllApiS as $key => $item) {
            echo sprintf('<li class="nav-item"><a class="nav-link %s" href="javascript:;" data-tab="%s"><i class="%s"></i><span class="nav-link-text"><font style="vertical-align: inherit;"> %s</font></span></a></li>', $num == 0 ? 'active' : '', str_replace('\\', '_', $namespace) . $key, $item['icon'], $item['title']); //
            $num++;
        }
        //echo '<li class="nav-item"><a class="nav-link" href="#menu_top"><span class="nav-link-text"><font style="vertical-align: inherit;"> 返回顶部↑↑↑</font></span></a></li>';
    } // 每个命名空间下的接口

    ?>

                        </ul>
                        <a class="nav-link" href="#menu_top"><span class="nav-link-text"><font style="vertical-align: inherit;"> 返回顶部↑↑↑</font></span></a>
                    </div>
                </div>
            </div>

            <div class="scroll-element scroll-x">
                <div class="scroll-element_outer">
                    <div class="scroll-element_size">
                    </div>
                    <div class="scroll-element_track">
                    </div>
                    <div class="scroll-bar" style="width: 0px;">
                    </div>
                </div>
            </div>
            <div class="scroll-element scroll-y">
                <div class="scroll-element_outer">
                    <div class="scroll-element_size">
                    </div>
                    <div class="scroll-element_track">
                    </div>
                    <div class="scroll-bar" style="height: 0px; top: 0px;">
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php }?>
    <!-- 折叠时的菜单 -->

    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form action="/docs.php?search=k" class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" method="get">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-search">
                                        </i>
                                    </span>
                                </div>
                                <input class="form-control" placeholder="Search" name="keyword" type="text" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
                                </input>
                            </div>
                        </div>
                        <button aria-label="Close" class="close" data-action="search-close" data-target="#navbar-search-main" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark active" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line">
                                    </i>
                                    <i class="sidenav-toggler-line">
                                    </i>
                                    <i class="sidenav-toggler-line">
                                    </i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" data-action="search-show" data-target="#navbar-search-main" href="#">
                                <i class="ni ni-zoom-split-in">
                                </i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0 ">
                        <li class="nav-item ">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="图片占位符" src="./gen.svg">
                                    </img>
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm font-weight-bold">
                                        <font style="vertical-align: inherit;color:white">
                                            Aunger
                                        </font>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->

        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item">
                                        <a href="#">
                                            <i class="fa fa-home">
                                            </i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">
                                            <font style="vertical-align: inherit;">
                                                API
                                            </font>
                                        </a>
                                    </li>
                                    <li aria-current="page" class="breadcrumb-item active">
                                        <font style="vertical-align: inherit;" id="api-name">
                                            总览
                                        </font>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                                                <div class="col-lg-6 col-5 text-right">
<?php if (isset($_GET['type']) && $_GET['type'] == 'expand') {echo '
                            <a class="btn btn-sm btn-neutral" href="/docs.php">
                                <font style="vertical-align: inherit;">
                                    切换列表版
                                </font>
                            </a>
                        ';} else {echo '
                            <a class="btn btn-sm btn-neutral" href="/docs.php?type=expand">
                                <font style="vertical-align: inherit;">
                                    切换展开版
                                </font>
                            </a>
                            ';}?>
     </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 折叠时与展开时的布局差异 -->
        <?php if ($theme == 'fold') {?>
        <div class="twelve wide stretched column">
            <?php } else {
    ?>
            <div class="wide stretched column">
                <?php
// 展开时，将全部的接口服务，转到第一组
    $mergeAllApiS = array('all' => array('methods' => array()));
    foreach ($allApiS as $namespace => $subAllApiS) {
        foreach ($subAllApiS as $key => $item) {
            if (!isset($item['methods']) || !is_array($item['methods'])) {
                continue;
            }
            foreach ($item['methods'] as $mKey => $mItem) {

                // 根据搜索关键字，匹配接口名称、功能说明、具体描述 - START
                if (!empty($_GET['keyword'])) {
                    $keyword          = $_GET['keyword'];
                    $isMatchByKeyword = false;
                    if (stripos($mItem['service'], $keyword) !== false) {
                        $isMatchByKeyword = true;
                    } else if (stripos($mItem['title'], $keyword) !== false) {
                        $isMatchByKeyword = true;
                    } else if (stripos($mItem['desc'], $keyword) !== false) {
                        $isMatchByKeyword = true;
                    }
                    // 未匹配，则跳过
                    if (!$isMatchByKeyword) {
                        continue;
                    }
                }
                // 根据搜索关键字，匹配接口名称、功能说明、具体描述 - END

                $mergeAllApiS['all']['methods'][$mKey] = $mItem;
            }
        }
    }
    $allApiS = array('ALL' => $mergeAllApiS);
}
?>

                <!-- Page content -->
                <div class="container-fluid mt--6">
                    <div class="row">

                        <?php
$num2 = 0;
foreach ($allApiS as $namespace => $subAllApiS) {
    foreach ($subAllApiS as $key => $item) {
        ?>

                        <div class="col <?php if ($num2 == 0) {?>active<?php }?>" id="<?php echo str_replace('\\', '_', $namespace) . $key; ?>">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">
                                        <font style="vertical-align: inherit;">
                                            接口列表
                                        </font>
                                    </h3>
                                </div>
                                <!-- Light table -->
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="sort" data-sort="id" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        ID
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="address" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        接口服务
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="name" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        接口名称
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="description" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        接口地址
                                                    </font>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
$num = 1;
        foreach ($item['methods'] as $mKey => $mItem) {
            $s    = str_replace('\\', '_', $mItem['service']);
            $link = $this->makeApiServiceLink($s, $theme);
            $NO   = $num++;
            echo "<tr><td class=\"budget\"><font style=\"vertical-align: inherit;\">{$NO}</font></td><td class=\"budget\"><a href=\"$link\"><font style=\"vertical-align: inherit;\">{$s}</font></a></td><td class=\"budget\"><font style=\"vertical-align: inherit;\">{$mItem['title']}</font></td><td class=\"budget\"><font style=\"vertical-align: inherit;\">{$mItem['desc']}</font></td></tr>";
        }
        ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>


                        <?php
$num2++;
    } // 单个命名空间的循环
} // 遍历全部命名空间
?>


                    </div>
                    <div class="alert alert-success" role="alert">
                        <strong>
                            温馨提示：
                        </strong>
                        此接口文档根据接口代码和注释实时自动生成，可在接口类的文件注释的第一行修改左侧菜单标题。
                    </div>

                    <!-- Footer -->
                    <footer class="footer pt-0">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6">
                                <div class="copyright text-center text-lg-left text-muted">
                                    <font style="vertical-align: inherit;">
                                        ©2020
                                    </font>
                                    <a class="font-weight-bold ml-1" href="https://webaun.cn" target="_blank">
                                        <font style="vertical-align: inherit;">
                                            Geek Designer
                                        </font>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://www.phalapi.net/" target="_blank">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    Phalapi
                                                </font>
                                            </font>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="http://docs.phalapi.net/#/" target="_blank">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    开发文档
                                                </font>
                                            </font>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <!--desc-->
            <script type="text/javascript">
    var secId = $('.active').get(0).dataset["tab"];
$("#api-name").html(secId);
                $(function() {
    var secId = $('.active').get(0).dataset["tab"];
    $('.navbar-nav').on('click', 'a', function(e) {
        var cur = $(".active");
        cur.removeClass("active");
        var currentSec = cur.get(0).dataset["tab"];
        $("#" + currentSec).css('display', 'none');
        this.classList.add("active");
        var secID = this.dataset["tab"];
        $("#" + secID).css('display', 'block');
$("#api-name").html(secID);
    })
})
            </script>
            <!-- Core -->
            <script src="./assets/vendor/jquery/dist/jquery.min.js">
            </script>
            <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js">
            </script>
            <!-- Argon JS -->
            <script src="./assets/js/argon.min.js">
            </script>
</body>

</html>