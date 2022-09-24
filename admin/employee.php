<!DOCTYPE html>
<?php include "../includes/init.php"; ?>
<?php
    $employees = Employee::find_all();
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
    
    <section >
            <div class="container">
                <div class="customerPage">

                        <table class="table">
                        <thead>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>المهنة</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>البريد الإلكتروني</th>
                            <th>رقم الحساب</th>
                            <th>تاريخ التوظيف</th>
                            <th>الفرع</th>
                            <th>حذف</th>
                        </thead>
                        <tbody>
                            <?php foreach ($employees as $employee):?>
                                <tr>
                            <td><?php echo $employee->id?></td>
                            <td><?php echo $employee->name?></td>
                            <td><?php $job = Jobs::find_by_id($employee->jopId);
                            echo $job->jobTitle ?></td>
                            <td><?php echo $employee->address?></td>
                            <td><?php echo $employee->phone?></td>
                            <td><?php echo $employee->email?></td>
                            <td><?php echo $employee->accountId?></td>
                            <td><?php echo $employee->date?></td>
                            <td><?php $branch = Branches::find_by_id($employee->barachId);
                             echo $branch->name?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>

                </div>
            </div>
    </section>
</body>
</html>