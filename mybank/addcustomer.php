<!DOCTYPE html>
<?php include "../includes/init.php"; ?>
<?php 
$msg ='';
$account='';
$balance='';
if(isset($_POST['submit'])){
    $customers = Customer::post();
    $customers->save();
    $msg= "we saved the new customer";
    $account=$customers->customerAccountId;
    $balance=$customers->customerBalance;
}
?>
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

<section>
    
    <div class="continer">
        <div class="increase">
           <h1 style="color: #430199;" >اضافة عميل جديد</h1>
           
           <form action="" method="POST">
            <h3><?php echo $msg;?></h3>
            <h3> رقم حسابك هو <?php echo $account;?></h3>
            <h3>رصيدك : <?php echo $balance;?></h3>
               <div class="form-control">
               <label for="uname">عملة الحساب</label>
               <select name="currency" id="">
            <?php
            /// for set the currencies that availble in the bank
            $currencies = Currency::find_all();
                foreach($currencies as $currency){
                echo " <option value='$currency->id'>{$currency->name}</option>";}
            ?>
           
        </select>
               </div>
               <div class="form-control">
               <label for="uname">فرع البنك</label>
               <select name="branches" id="">
            <?php
            /// for set the baranch that availble in the bank
            $branches = Branches::find_all();
                foreach($branches as $branch){
                echo " <option value='$branch->id'>{$branch->name}</option>";}
            ?>
           
        </select>
               </div>
               
               <div class="form-control">
                   <label for="uname">اسم العميل الأول</label>
                   <input placeholder="اسم مقدم الطلب"  type="text" name="customerFirstName" class="uname">
               </div>
               <div class="form-control">
                   <label for="uname">اسم العميل الثاني</label>
                   <input placeholder="اسم مقدم الطلب"  type="text" name="customerSecondName" class="uname">
               </div>
               <div class="form-control">
                   <label for="uname">اسم العميل الثالث</label>
                   <input placeholder="اسم مقدم الطلب"  type="text" name="customerThirdName" class="uname">
               </div>
               <div class="form-control">
                   <label for="uname">اسم العميل الرابع</label>
                   <input placeholder="اسم مقدم الطلب"  type="text" name="customerForthName" class="uname">
               </div>
               <div class="form-control">
                   <label for="uname">تاريخ الميلاد</label>
                   <input placeholder="اسم مقدم الطلب"  type="date" name="customerDateOfBearth" class="uname">
               </div>
               <div class="form-control">
                <label for="identity"> رقم البطاقة الشخصية </label>
                <input placeholder="رقم اثبات الشخصية"  type="number" name="nationalId" class="identity">
               </div>
                <div class="form-control">
                <label for="identity"> ايميل العميل</label>
                <input placeholder="رقم اثبات الشخصية"  type="email" name="customerEmail" class="identity">
                </div>
               <div class="form-control">
                   <label for="address"> العنوان</label>
                   <input placeholder="محل الاقامة"  type="text" name="customerAddress" class="address">
                </div>

               <div class="form-control">
                   <label for="telephone">  رقم الهاتف</label>
                   <input placeholder="رقم تواصل مقدم الطلب" type="number" name="customerPhoneNumber" class="telephone">
                </div>
                
                
             


            <div class="mount-update" >
               <div>
                   <label for="mount">المبلغ المراد ايداعه</label>
                   <input placeholder="أقل مبلغ 2000 جنيه" type="number" name="customerBalance" class="mount">
               </div>
               <div>
                   <label for="nowBalance">الرصيد الحالي </label>
                   <input placeholder="0.00" readonly  type="number" class="nowBalance" value="<?php echo $balance; ?>">
               </div>
           </div>
           <input style="background-color: #430199; font-family: cairo; height: 40px;" type="submit" value="تأكيد" name="submit">
           </form>
        </div>

        <hr style="border:solid 2px #856262">
     
       </div>

</section>
</body>
</html>