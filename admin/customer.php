<!DOCTYPE html>
<?php include "../includes/init.php"; ?>
<?php
    $customers = Customer::find_all();
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
                            <th>الاسم الأول</th>
                            <th>الإسم الثاني</th>
                            <th>الإسم الثالث</th>
                            <th>الإسم الرابع</th>
                            <th>تاريخ الميلاد</th>
                            <th>الرصيد</th>
                            <th>العنوان</th>
                            <th>البريد الإلكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>الفرع</th>
                            <th>العملة</th>
                            <th>رقم الحساب</th>
                            <th>رقم الهوية</th>
                            <th>حذف</th>
                        </thead>
                        <tbody>
                            <?php foreach ($customers as $customer):?>
                                <tr>
                            <td><?php echo $customer->id?></td>
                            <td><?php echo $customer->customerFirstName?></td>
                            <td><?php echo $customer->customerSecondName?></td>
                            <td><?php echo $customer->customerThirdName?></td>
                            <td><?php echo $customer->customerForthName?></td>
                            <td><?php echo $customer->customerDateOfBearth?></td>
                            <td><?php echo $customer->customerBalance?></td>
                            <td><?php echo $customer->customerAddress?></td>
                            <td><?php echo $customer->customerEmail?></td>
                            <td><?php echo $customer->customerPhoneNumber?></td>
                            <td><?php echo $customer->customerBranchId?></td>
                            <td><?php echo $customer->currency?></td>
                            <td><?php echo $customer->customerAccountId?></td>
                            <td><?php echo $customer->nationalId?></td>
                            <td><a href="includes/deletecustomer.php?id=<?php echo $customer->id; ?>">Delete</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>

                </div>
            </div>
    </section>
</body>
</html>