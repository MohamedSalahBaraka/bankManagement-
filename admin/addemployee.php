<!DOCTYPE html>
<?php include "../includes/init.php"; ?>
<?php 
$msg ='';
$account='';
$balance='';
if(isset($_POST['submit'])){
    $Employee = Employee::post();
    $Employee->save();
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
                <li><a href="customer.php">العملاء</a>
                <li><a href="employee.php">الموظفين</a></li>
                <li><a href="addemployee.php">اضافة موظف</a></li>
                <li><a href="branches.php">الفروع</a></li>
                <li><a href="currency.php">العملات</a></li>
                <li><a href="jobs.php">الوظائف</a></li>
                <?php if($session->is_signed()){
                  /// TO LET ONLY MANAGERS INTER ADMIN SECTION
        $employee = Employee::find_by_id($session->user_id);
        if($employee->jopId != MANAGER){redirect('mybank/login.php');}}?>
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
     <?php }else{redirect('../mybank/login.php');}?>
           

           
    </div>

    </header>

<section>
    
    <div class="continer">
        <div class="increase">
           <h1 style="color: #430199;" >اضافة موظف جديد</h1>
           
           <form action="" method="POST">
            <h3><?php echo $msg;?></h3>
            <h3> رقم حسابك هو <?php echo $account;?></h3>
            <h3>رصيدك : <?php echo $balance;?></h3>
               <div class="form-control">
               <label for="uname">الوظيفة</label>
               <select name="jopId" id="">
            <?php
            /// for set the currencies that availble in the bank
            $jobs = Jobs::find_all();
                foreach($jobs as $job){
                echo " <option value='$job->id'>{$job->jobTitle}</option>";}
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
                   <label for="uname">اسم الموظف</label>
                   <input placeholder="اسم مقدم الطلب"  type="text" name="name" class="uname">
               </div>
               <div class="form-control">
                   <label for="uname">كلمة السر</label>
                   <input placeholder="اسم مقدم الطلب"  type="password" name="password" class="uname">
               </div>
               <div class="form-control">
                   <label for="uname">تاريخ الميلاد</label>
                   <input placeholder="اسم مقدم الطلب"  type="date" name="customerDateOfBearth" class="uname">
               </div>
               <div class="form-control">
                <label for="identity"> رقم حساب الموظف</label>
                <input placeholder="رقم اثبات الشخصية"  type="number" name="accountId" class="identity">
               </div>
                <div class="form-control">
                <label for="identity"> ايميل</label>
                <input placeholder="رقم اثبات الشخصية"  type="email" name="email" class="identity">
                </div>
               <div class="form-control">
                   <label for="address"> العنوان</label>
                   <input placeholder="محل الاقامة"  type="text" name="address" class="address">
                </div>

               <div class="form-control">
                   <label for="telephone">  رقم الهاتف</label>
                   <input placeholder="رقم تواصل مقدم الطلب" type="number" name="phone" class="telephone">
                </div>
           <input style="background-color: #430199; font-family: cairo; height: 40px;" type="submit" value="تأكيد" name="submit">
           </form>
        </div>

        <hr style="border:solid 2px #856262">
     
       </div>

</section>
</body>
</html>