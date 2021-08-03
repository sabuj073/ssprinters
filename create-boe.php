<?php include 'includes/header.php';
$date = str_replace(" ","",sha1(date('r', time())));
$id = $_GET['id'];

if(isset($_POST['submit'])){

    $text = mysqli_real_escape_string($con,$_POST['text']);
    $to_data = mysqli_real_escape_string($con,$_POST['to_data']);
    $swift = mysqli_real_escape_string($con,$_POST['swift']);
    $sum_of = mysqli_real_escape_string($con,$_POST['sum_of']);
    $in_words = mysqli_real_escape_string($con,$_POST['in_words']);
    $pi_date = mysqli_real_escape_string($con,$_POST['pi_date']);

    $sql = "INSERT INTO `bill_of_exchange` ( `pi_slug`, `test`, `To_the_Order_of`, `swift`, `sum_of`, `in_word`, `perfoma_date`) VALUES ('$id', '$text', '$to_data', '$swift', '$sum_of', '$in_words', '$pi_date')";


    $query = mysqli_query($con,$sql);
    echo "<script>window.location.href='print-boe?id=".$id."'</script>";

}

?>

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Bill Of Exchange
                            <small><?=$info['shop_name']?> Admin Panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Bill Of Exchange</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="">
                <div class="card">
                    <div class="card-header">
                        <h5>Bill Of Exchange</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Text</th>
                                <td><textarea name="text" class="form-control">Pay 90 days at the sight of <b><u>SECOND</u></b> bill of exchange <b><u>FIRST</u></b> of the same tenor and date being unpaid</textarea></td>
                            </tr>
                            <tr>
                                <th>To the Order of</th>
                                <td><textarea class="form-control" name="to_data"></textarea></td>
                            </tr>
                            <tr>
                                <th>S.W.I.F.T</th>
                                <td><input type="text" name="swift" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>The Sum Of</th>
                                <td><input type="text" name="sum_of" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>In Words</th>
                                <td><textarea class="form-control" name="in_words"></textarea></td>
                            </tr>
                            <tr>
                                <th>Perfoma Invoice Date</th>
                                <td><input class="form-control" type="date" name="pi_date"></td>
                            </tr>
                        </table>
                        <div class="col-md-12 text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>


            
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

<?php include 'includes/footer.php'; ?>
<script type="text/javascript">

    $(document).ready(function(){
        var table = $('#edit').DataTable({
            "destroy": true,
            lengthChange: false,
            responsive: false,
            buttons: ['csv', 'excel', 'pdf', 'print']
        });
        table.buttons().container().appendTo('#edit_wrapper .col-md-6:eq(0)');

        $.ajax({
            url: "action.php",
            method:"POST",
            data:{
                getalldata : 1,
            }, 
            success: function(result){
                $('#edit').DataTable().clear();
                $('#edit').DataTable().destroy();
                $("#data").html(result);
                var table = $('#edit').DataTable({
                    "destroy": true,
                    lengthChange: false,
                    responsive: false,
                    buttons: ['csv', 'excel', 'pdf', 'print']
                });
                table.buttons().container().appendTo('#edit_wrapper .col-md-6:eq(0)');
            }
        });
    });

</script>

<script type="text/javascript">
    function convertToSlug(){
        var Text = $("#title").val();

        Text = Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
        $("#url").val(Text);
    }
</script>