<?php
$title = "Assessment Status";
include ROOT."app/theme/header.php";
require_once PATH_MODEL . 'model_exam_status.php';

$name   = isset($_GET['txtName']) ? $_GET['txtName'] : false;
$status = isset($_GET['cbStatus']) ? $_GET['cbStatus'] : false;

if($name)
    $where['question_type'] = $name;

if(!isset($_SESSION['is_admin']))
    $where['participant_id'] = $_SESSION['id'];

$m_question     = new model_exam_status($db);
$page_number    = is_numeric($_GET['hal']) ? $_GET['hal'] : 1;
$data_per_page  = 20;
$total_rows     = $m_question->total_rows();
$arr_question   = $m_question->get_results($where, $page_number, $data_per_page);
?>
    <div class="br-mainpanel">
		<div class="br-pagetitle">
			<h4><?=isset($title) ? $title : 'Untitled';?></h4>
		</div>
		<div class="br-pagebody">

        <!-- Main content -->

        <?=$GLOBALS['notice']->showSuccess();?>
        <?=$GLOBALS['notice']->showError();?>

        <div class="card bd-0 shadow-base pd-15">
            <div class="bg-gray-300 bd pd-15 mg-b-15">
                <strong style="color:#343a40;">Menu Filter</strong>
            </div>
            <div class="bg-gray-300 bd pd-15 mg-b-15 rounded">
                <form method="GET" action="<?=HTTP;?>">
                    <input type="hidden" name="page" value="question">
                    <div class="row row-sm">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Assessment Name</label>
                                <input type="text" name="txtName" class="form-control" placeholder="Assessment Name" value="<?=!empty($_GET['txtName']) ? $_GET['txtName'] : '';?>">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-block btn-primary mg-t-30">
                                <i class="ion ion-md-search"></i> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <?php if (!empty($arr_question)): ?>

                <div class="bd bd-gray-300 rounded table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="min-w align-middle">Created<br>Updated</th>
                                <th class="align-middle">Assessment Name</th>
                                <th class="text-center align-middle">Total Question</th>
                                <th class="text-center align-middle">Total Answered</th>
                                <th class="text-center align-middle">Total Correct</th>
                                <th class="text-center align-middle">Grade</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($arr_question as $value): ?>
                            <tr>
                                <td class="min-w">

                                    <?php if ($value['created'] != $value['updated']): ?>

                                        <strong><?=strtoupper($value['updated_by']);?></strong>
                                        <br>
                                        <?=timestamp_to_date($value['updated']);?>
                                        <hr>

                                    <?php endif;?>

                                    <strong><?=strtoupper($value['created_by']);?></strong>
                                    <br>
                                    <?=timestamp_to_date($value['created']);?>

                                </td>
                                <td class="align-middle">
                                    <?=$value['question_type'];?>
                                </td>
                                <td class="align-middle text-center">
                                    <?=$value['total_question'];?>
                                </td>
                                <td class="align-middle text-center">
                                    <?=$value['total_answered'];?>
                                </td>
                                <td class="align-middle text-center">
                                    <?=$value['total_correct'];?>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-warning"><?=$value['value'];?></span>
                                </td>
                            </tr>

                            <?php endforeach;?>

                        </tbody>
                    </table>
                </div>


                <?php if($total_rows > $data_per_page): ?>
                    <div class="ht-80 d-flex align-items-center justify-content-center">
                        <nav aria-label="Page navigation">
                            <?php
                            $pagination = new pagination($data_per_page);
                            $pagination->pagination($total_rows, HTTP . "?page=" . $_GET['page']);
                            ?>
                        </nav>
                    </div>
                <?php endif;?>

            <?php else: ?>

            <div class="mg-t-30">
                <h3 class="text-center">No record found.</h3><br>
            </div>

            <?php endif;?>

        </div>

        <script>
            function deleteConfirm(link){
                Swal({
                    title: 'Are you sure?',
                    text: "You will not be able to return this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete this!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.value) {
                        location.href = link;
                    }
                })
            }
        </script>

        <!-- End of main content -->

			<footer class="br-footer">
				<div class="footer-left">
				</div>
				<div class="footer-right d-flex align-items-center">
				</div>
			</footer>
		</div>
    </div>
<?php include ROOT."app/theme/footer.php";?>