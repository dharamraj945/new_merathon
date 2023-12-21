<?php
include "./header.php";
$front_home_obj = new Db_functions();


$qry = "SELECT *  FROM `grt_section_group` WHERE client_id =$_SESSION[active_user] ";


$result = $front_home_obj->data_fetch($qry);


?>


<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Customize Store</h6>
                <a id="manage_btn" href="./manage_front" class="btn btn-primary btn-sm">
                    <i class=" fa fa-plus"></i> Manage
                </a>

                <button style="display: none;" id="saveButton" class="btn btn-success btn-sm">
                    Save
                </button>

            </div>
            <div class="table-responsive">
                <table style="Overflow-x:scroll;" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Sno</th>
                            <th>Section Name</th>
                            <th>Sequence </th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>




                        <?php

                        if ($result != 0) {

                            $sno = 0;
                            foreach ($result as $key => $value) {
                                $sno++;
                        ?>


                                <tr>
                                    <td><a href="#">
                                            <?= $sno; ?>
                                        </a></td>
                                    <td>
                                        <?= $value['section_group_title'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <input data-id="<?= $value['id'] ?>" name="section_seq" class="form-control section_seq" value="<?= $value['section_seq'] ?>" type="number" name="" id="section_seq">



                                        </div>
                                    </td>

                                    <td>
                                        <?= $value['created_date'] ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#sec_front<?php $value['id'] ?>">Delete</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="sec_front<?php $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are You Sure !</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span class="text-danger"> You won't be able to revert this !</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="./section_backend.php?del_section=<?= $value['id'] ?>" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->


                                    </td>
                                </tr>

                        <?php }
                        } else {
                            echo "Please Add An Section";
                        }
                        ?>





                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {


        $('.section_seq').keyup(function() {
            $('#saveButton').show();
            $('#manage_btn').hide();
        });
        $('#saveButton').on('click', function() {

            var inputValues = [];

            // Loop through each input box
            $('.section_seq').each(function() {
                // Get the value of the data-id attribute
                var section_id = $(this).data('id');
                // Get the input value


                var seq_number = $(this).val();
                // Add the data-id and value to the array
                inputValues.push({
                    section_id: section_id,
                    seq_number: seq_number
                });
            });

            $.ajax({
                url: './section_backend.php',
                method: 'POST',
                data: {
                    inputValues: inputValues
                },
                success: function(response) {
                    // Handle success, for example, show a success message

                    if (response == 'true') {
                        alert("Sequence Updated");
                        window.location.href = "./front_home";
                    }
                    // Hide the save button after saving
                    $('#saveButton').hide();
                    $('#manage_btn').show();

                },
                error: function(error) {
                    // Handle error, for example, show an error message
                    alert('Error saving values: ' + error);
                }
            });



        })
    });
</script>
<?php

include "./footer.php";
?>