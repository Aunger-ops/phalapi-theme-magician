<?php

// 搜索关键字
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$url     = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) ? 'https://' : 'http://';
$url     = $url . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost');
$url .= trim(substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1), '.');
$semanticPath = 'https://cdn.bootcss.com/semantic-ui/2.2.2/'; // CDN
$semanticPath = '/semantic/'; // 本地

echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
                <title>
                    {$description} - {$service} - {$projectName} - 在线接口文档
                </title>
                <!-- Favicon -->
                <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
                    <!-- Fonts -->
                    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
                        <!-- Icons -->
                        <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
                            <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
                                <!-- Argon CSS -->
                                <link href="./assets/css/argon.min.css" rel="stylesheet" type="text/css">
                                </link>
                            </link>
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
        <style type="text/css">
            .ct-page-title{margin-bottom:1.5rem;padding-left:1.25rem;border-left:2px solid #5e72e4}
            .ct-title{font-weight:300;margin-top:1rem;margin-bottom:.5rem}
        </style>
    </head>
    <body>
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
                                    <input class="form-control" name="keyword" placeholder="Search" type="text" value="{$keyword}">
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
            <!-- Header -->
            <div class="header bg-primary pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                        <div class="row align-items-center py-4">
                            <div class="col-lg-6 col-7">
                                <h6 class="h2 text-white d-inline-block mb-0">
                                    {$description}
                                </h6>
                                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                        <li class="breadcrumb-item">
                                            <a href="./docs.php">
                                                <i class="fa fa-home">
                                                </i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">
                                                API
                                            </a>
                                        </li>
                                        <li aria-current="page" class="breadcrumb-item active">
                                                    {$service}
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

EOT;

/**
 * 接口说明 & 接口参数
 */
echo <<<EOT
            <!-- Page content -->
            <div class="container-fluid mt--6 col-md-11">
                <div class="row">
                    <div class="col">
                        <div class="card border-0">
                            <div class="col-md-12">
                                <div class="ct-page-title">
                                    <h2 class="ct-title" id="content">
                                        <font style="vertical-align: inherit;">
                                            <i class="fa fa-align-left text-default">
                                            </i>
                                            接口文档
                                        </font>
                                    </h2>
                                </div>
                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    <span class="alert-text">
                                        {$descComment}
                                    </span>
                                </div>
                                <div class="ct-page-title">
                                    <h2 class="ct-title" id="content">
                                        <font style="vertical-align: inherit;">
                                            <i class="fa fa-sign-in text-warning">
                                            </i>
                                            接口参数
                                        </font>
                                    </h2>
                                </div>
                                <div class="table-responsive col-md-12">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="sort" data-sort="id" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        参数名字
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="address" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        类型
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="name" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        是否必须
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="description" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        默认值
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="description" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        其他
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="description" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        说明
                                                    </font>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
EOT;

$typeMaps = array(
    'string'  => '字符串',
    'int'     => '整型',
    'float'   => '浮点型',
    'boolean' => '布尔型',
    'date'    => '日期',
    'array'   => '字符串', // 转换成客户端看到的参数类型
    'fixed'   => '固定值',
    'enum'    => '枚举类型',
    'object'  => '对象',
);

foreach ($rules as $key => $rule) {
    // 接口文档不显示
    if (!empty($rule['is_doc_hide'])) {
        continue;
    }

    $name = $rule['name'];
    if (!isset($rule['type'])) {
        $rule['type'] = 'string';
    }
    $type    = isset($typeMaps[$rule['type']]) ? $typeMaps[$rule['type']] : $rule['type'];
    $require = isset($rule['require']) && $rule['require'] ? '<font color="red">必须</font>' : '可选';
    $default = isset($rule['default']) ? $rule['default'] : '';
    if ($default === null) {
        $default = 'NULL';
    } else if (is_array($default)) {
        // @dogstar 20190120 默认值，反序列
        $ruleFormat = !empty($rule['format']) ? strtolower($rule['format']) : '';
        if ($ruleFormat == 'explode') {
            $default = implode(isset($rule['separator']) ? $rule['separator'] : ',', $default);
        } else {
            $default = json_encode($default);
        }
    } else if (!is_string($default)) {
        $default = var_export($default, true);
    }

    // 数组类型的格式说明
    if ($rule['type'] == 'array' && in_array($rule['format'], array('json', 'explode'))) {
        $type .= sprintf(
            '<span class="ui label blue small">%s</span>',
            $rule['format'] == 'json'
            ? 'JSON格式'
            : sprintf('用%s分割', isset($rule['separator']) ? $rule['separator'] : ',')
        );
    }

    $other = array();
    if (isset($rule['min'])) {
        $other[] = '最小：' . $rule['min'];
    }
    if (isset($rule['max'])) {
        $other[] = '最大：' . $rule['max'];
    }
    if (isset($rule['range'])) {
        $other[] = '范围：' . implode('/', $rule['range']);
    }
    if (isset($rule['source'])) {
        $other[] = '数据源：' . strtoupper($rule['source']);
    }
    $other = implode('；', $other);

    $desc = isset($rule['desc']) ? trim($rule['desc']) : '';

    echo "<tr><td class=\"budget\"><font style=\"vertical-align: inherit;\"> $name</font></td><td class=\"budget\"><a href=\"\"><font style=\"vertical-align: inherit;\"> $type</font></a></td><td class=\"budget\"><font style=\"vertical-align: inherit;\"> $require</font></td><td class=\"budget\"><font style=\"vertical-align: inherit;\"> $default</font></td><td class=\"budget\"><font style=\"vertical-align: inherit;\"> $other</font></td><td class=\"budget\"><font style=\"vertical-align: inherit;\"> $desc</font></td></tr>\n";
}

/**
 * 返回结果
 */
echo <<<EOT
                                        </tbody>
                                    </table>
                                </div>
                                <div class="ct-page-title">
                                    <h2 class="ct-title" id="content">
                                        <i class="fa fa-sign-out text-success">
                                        </i>
                                        <font style="vertical-align: inherit;">
                                            返回结果
                                        </font>
                                    </h2>
                                </div>
                                <div class="table-responsive col-md-12">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="sort" data-sort="id" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        返回字段
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="address" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        类型
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="name" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        说明
                                                    </font>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
EOT;

foreach ($returns as $item) {
    $name   = $item[1];
    $type   = isset($typeMaps[$item[0]]) ? $typeMaps[$item[0]] : $item[0];
    $detail = $item[2];

    echo "<tr><td class=\"budget\"><font style=\"vertical-align: inherit;\"> $name</font></td><td class=\"budget\"><a href=\"\"><font style=\"vertical-align: inherit;\"> $type</font></a></td><td class=\"budget\"><font style=\"vertical-align: inherit;\"> $detail</font></td></tr>";
}

echo <<<EOT
            </tbody>
        </table>
EOT;

/**
 * 异常情况
 */
if (!empty($exceptions)) {
    echo <<<EOT
</div>
                                <div class="ct-page-title">
                                    <h2 class="ct-title" id="content">
                                        <font style="vertical-align: inherit;">
                                            <i class="fa fa-exclamation text-danger">
                                            </i>
                                            异常情况
                                        </font>
                                    </h2>
                                </div>
                                <div class="table-responsive col-md-12">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="sort" data-sort="id" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        错误码
                                                    </font>
                                                </th>
                                                <th class="sort" data-sort="address" scope="col">
                                                    <font style="vertical-align: inherit;">
                                                        错误描述信息
                                                    </font>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
EOT;

    foreach ($exceptions as $exItem) {
        $exCode = $exItem[0];
        $exMsg  = isset($exItem[1]) ? $exItem[1] : '';
        echo "<tr><td class=\"budget\"><font style=\"vertical-align: inherit;\"> $exCode</font></td><td class=\"budget\"><a href=\"\"><font style=\"vertical-align: inherit;\"> $exMsg</font></a></td></tr>";
    }

    echo <<<EOT
            </tbody>
        </table>
EOT;
}

/**
 * 返回结果
 */
echo <<<EOT
                                </div>
                                <div class="ct-page-title">
                                    <h2 class="ct-title" id="content">
                                        <font style="vertical-align: inherit;">
                                            <i class="fa fa-server text-info">
                                            </i>
                                            在线测试
                                        </font>
                                    </h2>
                                </div>
                                <form>
                                    <div class="table-responsive col-md-12">
EOT;

echo <<<EOT
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="sort" data-sort="id" scope="col">
                                                        <font style="vertical-align: inherit;">
                                                            参数
                                                        </font>
                                                    </th>
                                                    <th class="sort" data-sort="address" scope="col">
                                                        <font style="vertical-align: inherit;">
                                                            是否必填
                                                        </font>
                                                    </th>
                                                    <th class="sort" data-sort="name" scope="col">
                                                        <font style="vertical-align: inherit;">
                                                            值
                                                        </font>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <tr>
                                                    <td class="budget">
                                                        <font style="vertical-align: inherit;">
                                                            service
                                                        </font>
                                                    </td>
                                                    <td class="budget">
                                                        <a href="">
                                                            <font style="vertical-align: inherit;">
                                                                必须
                                                            </font>
                                                        </a>
                                                    </td>
                                                    <td class="budget">
                                                        <input name="service" data-source="get" value="{$service}" disabled="disabled" style="width:100%;" class="C_input form-control" />
                                                    </td>
                                                </tr>
EOT;
foreach ($rules as $key => $rule) {
    // 接口文档不显示
    if (!empty($rule['is_doc_hide'])) {
        continue;
    }

    $source = isset($rule['source']) ? $rule['source'] : '';
    //数据源为server和header时该参数不需要提供
    if ($source == 'server' || $source == 'header') {
        continue;
    }
    $name    = $rule['name'];
    $require = isset($rule['require']) && $rule['require'] ? '<font color="red">必须</font>' : '可选';
    // 提供给表单的默认值
    $default = isset($rule['default'])
    ? (is_array($rule['default']) // 针对数组，进行反序列化
         ? (!empty($rule['format']) && $rule['format'] == 'explode'
            ? implode(isset($rule['separator']) ? $rule['separator'] : ',', $rule['default'])
            : json_encode($rule['default']))
        : $rule['default'])
    : '';
    $default   = htmlspecialchars($default);
    $desc      = isset($rule['desc']) ? htmlspecialchars(trim($rule['desc'])) : '';
    $inputType = (isset($rule['type']) && $rule['type'] == 'file') ? 'file' : 'text';

    $multiple = '';
    if ($inputType == 'file') {
        $multiple = 'multiple="multiple"';
    }
    echo <<<EOT

                                                <tr>
                                                    <td class="budget">
                                                        <font style="vertical-align: inherit;">
                                                            {$name}
                                                        </font>
                                                    </td>
                                                    <td class="budget">
                                                        <a href="">
                                                            <font style="vertical-align: inherit;">
                                                                {$require}
                                                            </font>
                                                        </a>
                                                    </td>
                                                    <td class="budget">
                                                        <input name="{$name}" value="{$default}" data-source="{$source}" placeholder="{$desc}" style="width:100%;" class="C_input form-control" type="$inputType" $multiple/>
                                                    </td>
                                                </tr>
EOT;
}
echo <<<EOT
 </tbody>
                                        </table>
                                    </div>
EOT;
echo <<<EOT

 <div class="input-group mb-3">
                                        <input placeholder="请求的接口链接" aria-describedby="button-addon2" aria-label="Recipient's username"  value="{$url}" name="request_url" class="form-control" type="text">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" id="submit"  type="button">
                                                    请求
                                                </button>
                                            </div>
                                        </input>
                                    </div>
                                </form>
EOT;

/**
 * JSON结果
 */
echo <<<EOT
                                <div class="card">
                                    <div class="card-body" id="json_output">

                                    </div>
                                </div>
EOT;

/**
 * 动态生成客户端代码示例
 */
echo <<<EOT
                                <div class="ct-page-title">
                                    <h2 class="ct-title" id="content">
                                        <font style="vertical-align: inherit;">
                                            <i class="fa fa-terminal">
                                            </i>
                                            接口返回示例
                                        </font>
                                    </h2>
                                </div>
EOT;

$demoCodes = '';
$codeFile  = API_ROOT . '/src/view/docs/demos/' . $service . '.json';
if (file_exists($codeFile)) {
    $demoCodes = htmlspecialchars(file_get_contents($codeFile));
} else {
    $demoCodes = '// 暂时无返回示例，可添加示例文件：' . (\PhalApi\DI()->debug ? $codeFile : $service . '.json');
}

echo <<<EOT
<!-- 代码高亮 -->
<script>hljs.initHighlightingOnLoad();</script>
                                <div class="card">
                                    <div class="card-body">
    <pre><code>{$demoCodes}</code></pre>
                                    </div>
                                </div>
EOT;

/**
 * 底部
 */
$version  = PHALAPI_VERSION;
$thisYear = date('Y');
echo <<<EOT
        </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <div class="alert alert-success" role="alert">
                    <strong>
                        温馨提示：
                    </strong>
                    此接口文档根据接口代码和注释实时自动生成，可在接口类的文件注释的第一行修改左侧菜单标题。
                </div>
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
                                    <a class="nav-link" href="http://docs.phalapi.net/#/v2.0" target="_blank">
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
        <!-- Core -->
        <script src="./assets/vendor/jquery/dist/jquery.min.js">
        </script>
        <script src="https://apps.bdimg.com/libs/jquery.cookie/1.4.1/jquery.cookie.min.js"></script>
        <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js">
        </script>
        <!-- Argon JS -->
        <script src="./assets/js/argon.min.js">
        </script>







    <script type="text/javascript">
        function getData() {
            var data = new FormData();
            var param = [];
            $("td input").each(function(index,e) {
                if ($.trim(e.value)){
                    if (e.type != 'file'){
                        if ($(e).data('source') == 'get') {
                            param.push(e.name + '=' + e.value);
                        } else {
                            data.append(e.name, e.value);
                        }

                        if (e.name != "service") $.cookie(e.name, e.value, {expires: 30});
                    } else{
                        var files = e.files;
                        if (files.length == 1){
                            data.append(e.name, files[0]);
                        } else{
                            for (var i = 0; i < files.length; i++) {
                                data.append(e.name + '[]', files[i]);
                            }
                        }
                    }
                }
            });
            param = param.join('&');
            return {param:param, data:data};
        }

        $(function(){
            $("#json_output").hide();
            $("#submit").on("click",function(){
                $("#json_output").html('接口请求中……');
                $("#json_output").show();

                var data = getData();
                var url_arr = $("input[name=request_url]").val().split('?');
                var url = url_arr.shift();
                var param = url_arr.join('?');
                param = param.length > 0 ? param + '&' + data.param : data.param;
                url = url + '?' + param;
                $.ajax({
                    url: url,
                    type:'post',
                    data:data.data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(res,status,xhr){
                        console.log(xhr);
                        var statu = xhr.status + ' ' + xhr.statusText;
                        var header = xhr.getAllResponseHeaders();
                        var json_text = JSON.stringify(res, null, 4);    // 缩进4个空格
                        $("#json_output").html('<pre class="col-md-12" style="border-radius:5px;background-color:#F0F0F0"><br>'+statu + '<br/>' + header + '<br/>' +'<code id="response">' +  json_text + '</code><br></pre>');
                        $("#json_output").show();
                        var response = document.getElementById("response");
                        hljs.highlightBlock(response);
                    },
                    error:function(error){
                        $("#json_output").html('接口请求失败：' + error);
                    }
                })
            })

            fillHistoryData();
        })

        // 填充历史数据
        function fillHistoryData() {
            $("td input").each(function(index,e) {
                var cookie_value = $.cookie(e.name);
                if (e.name != "service" && cookie_value != "" && cookie_value !== undefined) {
                    e.value = cookie_value;
                }
            });
        }

    </script>



    </body>
</html>
EOT;
