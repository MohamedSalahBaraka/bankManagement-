<!DOCTYPE html>
<?php include "../includes/init.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/css/style.css">
    <title>اضافة عميل</title>
</head>
<body>
    <header>
        <div class="logo">
            <span>مصرفي</span>
        </div> 

        <div class="navbar">
            <ul>
                <li><a href="../index.php">الرئيسية</a></li>
                <li><a href="../mybank/deposit.php">ايداع</a>
                <li><a href="../mybank/withdrawal.php">سحب</a></li>
                <li> <p>طلب خدمة</p>
                    <div class="dropdown">
                        <a href="../mybank/electricServices.php">شراء كهرباء </a>
                        <hr>
                        <a href="../mybank/mobileService.php">شراء رصيد </a>
                        <hr>
                        <a href="../mybank/eduServices.php">دفع رسوم  دراسة</a>

                    </div></li>
                <li><a href="../mybank/addcustomer.php">اضافة عميل</a></li>
                <li><a href="customer.php">بيانات العملاء</a></li>
                <<li><a href="report.php">تقرير</a></li>
                <?php if($session->is_signed()){
                  /// TO LET ONLY MANAGERS INTER ADMIN SECTION
        $employee = Employee::find_by_id($session->user_id);
        if($employee->jopId == MANAGER){?>
        <li><a href="../admin/">بيانات العملاء</a></li>
            
     <?php }}?>
            </ul>
    </div>

    <div class="auth">
      <?php 
      // TO FORCE LOG BEFORE USE ANY THING
      if($session->is_signed()){?>
        <div >
        <span id="userNameLoged"></span>
        <a href="includes/logout.php"><span id='signOut' href="">خروج</span></a>
       </div>
     <?php }else{redirect('mybank/login.php');}?>
           

           
    </div>
    <?php if(isset($_POST['customerAccountId']) &&$_POST['customerAccountId'] != ''){
if(isset($_POST['submit'])){
    $transactions = Transaction::find_by_account($_POST['customerAccountId']);
}} else {
    $transactions = Transaction::find_all();
}?>

    </header>
    <section >
            <div class="container">
            <form action="" method="POST">
                    <span class="alert"></span>
                    <div class="form-control">
                     <label for="idAccount">رقم الحساب</label>
                     <input type="number" name="customerAccountId">
                    </div>
                    <input style="background-color: #018786; font-family: cairo; height: 40px;" type="submit" value="تأكيد" name="submit">
                </form>
            <table class="table">
                        <thead>
                            <th>#</th>
                            <th>المستفيد</th>
                            <th>عمولة البنك</th>
                            <th>من حساب</th>
                            <th>المبلغ </th>
                            <th>تاريخ</th>
                            <th>العملة</th>
                            <th>معرف الفاتورة</th>
                        </thead>
                        <tbody>
                            <?php foreach ($transactions as $transaction):?>
                                <tr>
                            <td><?php echo $transaction->id?></td>
                            <td><?php echo $transaction->beneficary?></td>
                            <td><?php echo $transaction->intrest?></td>
                            <td><?php echo $transaction->fromAccountId?></td>
                            <td><?php echo $transaction->money?></td>
                            <td><?php echo $transaction->date?></td>
                            <td><?php echo $transaction->currency?></td>
                            <td><?php echo $transaction->reportId?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>
                </div>
            </div>
    </section>

</body>
</html>