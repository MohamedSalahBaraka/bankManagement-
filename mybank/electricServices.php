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
                <li><a href="deposit.php">ايداع</a>
                <li><a href="withdrawal.php">سحب</a></li>
                <li> <p>طلب خدمة</p>
                    <div class="dropdown">
                        <a href="electricServices.php">شراء كهرباء </a>
                        <hr>
                        <a href="mobileService.php">شراء رصيد </a>
                        <hr>
                        <a href="eduServices.php">دفع رسوم  دراسة</a>

                    </div></li>
                <li><a href="addcustomer.php">اضافة عميل</a></li>
                <li><a href="report.php">تقرير</a></li>
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

    </header>
    <?php
$name='';
$balance='';
$account='';
if(isset($_POST['customerAccountId']) &&$_POST['customerAccountId'] != ''){

if(isset($_POST['submit'])){
    $customer = Customer::find_by_account($_POST['customerAccountId']);
    $name=$customer->customerFirstName." ".$customer->customerSecondName." ".$customer->customerThirdName." ".$customer->customerForthName;
    $balance=$customer->customerBalance;
    $account = $customer->customerAccountId;
}
if(isset($_POST['deposit'])){
    $customer = Customer::find_by_account($_POST['customerAccountId']);
    $customer->customerBalance = $customer->customerBalance - $_POST['cash'] -50;
    $customer->save();
    $name=$customer->customerFirstName." ".$customer->customerSecondName." ".$customer->customerThirdName." ".$customer->customerForthName;
    $balance=$customer->customerBalance;
    $account = $customer->customerAccountId;
    //for report
    $tra = new Transaction;
    $tra->intrest = 50;
    $tra->money =  $_POST['cash'] ;
    $tra->fromAccountId = $customer->customerAccountId;
    $tra->currency = $customer->currency;
    $tra->reportId = $_POST['reportId'];
    $tra->save();
    
    echo "<h1>it's done</h1>";
}} 
?>
    <section class="services" >
        <div class="container">
           

            <div class="askService">
            
                <div  class="electricPayment serv ">
                    <h1 style="color: #B00020;" >شراء كهرباء</h1>
                    
                    <form action="" method="POST">
                    <span class="alert"></span>
                    <div class="form-control">
                     <label for="idAccount">رقم الحساب</label>
                     <input type="number" name="customerAccountId">
                    </div>
                    <input style="background-color: #018786; font-family: cairo; height: 40px;" type="submit" value="تأكيد" name="submit">
                </form>
                    <form action="" method="POST">
                    <div class="form-control">
                        <label for="uname">اسم العميل</label>
                        <input readonly type="text" name="" class="uname" value="<?php echo $name; ?>">
                    </div>
                    <input type="hidden" value="<?php echo $account; ?>" name="customerAccountId">
                    <div class="form-control">
                     <label for="balance"> الرصيد الحالي</label>
                     <input readonly type="number" name="" class="balance" value="<?php echo $balance?>">
                        <input class="eleNumber" type="number"  min="" placeholder=" ادخل رقم العداد مكون من 8 ارقام" name="reportId">
                        <input class="price" type="number"  min="0" name="cash" placeholder="ادخل مبلغ الشراء 100 جنيه اقل قيمة" oninput="validity.valid||(value='');">
                        <span >سيتم خصم 50 جنيه رسوم للمعاملة من حساب العميل  </span>
                         <h3  class="credit" ></h3>
                         <input style="background-color: #018786; font-family: cairo; height: 40px;" type="submit" name="deposit" value="تأكيد">
                </div>
        </div>
        
    </section>


</body>
</html>