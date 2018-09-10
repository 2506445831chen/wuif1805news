<?php include 'star.html' ?>


    <div class="bqn">
        <div class="bqo">
            <h6 class="bqq">Dashboards</h6>
            <h2 class="bqp">Order history</h2>
        </div>

        <div class="on bqr">
            <div class="axm bpy">
                <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                <span class="bv bbc"></span>
            </div>
        </div>
    </div>

    <div class="bop ayg">
        <div class="boq bor">
            <div class="axm bpy">
                <input type="text" class="form-control bsx" placeholder="Search orders">
                <span class="bv bhw"></span>
            </div>
        </div>
    </div>

    <div class="ly">
        <table class="ck" data-sort="table">
            <thead>
            <tr>
                <th class="header"><input type="checkbox" class="bsn" id="selectAll"></th>
                <th class="header headerSortDown">id</th>
                <th class="header">标题</th>
                <th class="header">描述</th>
                <th class="header">内容</th>
                <th class="header">操作</th>
            </tr>
            </thead>
            <tbody id="tbody">
            <?php foreach ($rows as $k => $v) { ?>
                <tr data-id="<?php echo $v['id'] ?>">
                    <td> <input type="checkbox" class="bsn"></td>
                    <td><a href="#"><?php echo $v['id'] ?></a></td>
                    <td><input data-type="title" id="tit" class="form-control bsx" type="text" value="<?php echo $v['title'] ?>"></td>
                    <td><input data-type="dsc" id="dsy" class="form-control bsx" type="text" value="<?php echo $v['dsc'] ?>"></td>
                    <td><input data-type="content" id="cont" class="form-control bsx" type="text" value="<?php echo $v['content'] ?>"></td>
                    <td class="remove">
                        <button type="button" class="ce nr">
                            <span class="bv bei"></span>
                        </button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <div id="progress" style="width: 40px;height: 40px;background: none; border: 2px solid red; border-radius: 50%;margin: 0 auto;display: none;"></div>
        <div class="boq">
            <div class="ol" id="submit">
                <button type="button" class="ce nr">
                    <span class="bv bji"></span>
                </button>
            </div>
        </div>
    </div>

    <div class="avv">
        <nav>
            <ul class="qn">
                <li class="qp">
                    <a class="qo" href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="adp">Previous</span>
                    </a>
                </li>
                <li class="qp active"><a class="qo" href="#">1</a></li>
                <li class="qp"><a class="qo" href="#">2</a></li>
                <li class="qp"><a class="qo" href="#">3</a></li>
                <li class="qp"><a class="qo" href="#">4</a></li>
                <li class="qp"><a class="qo" href="#">5</a></li>
                <li class="qp">
                    <a class="qo" href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                        <span class="adp">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

<?php include 'footed.html' ?>