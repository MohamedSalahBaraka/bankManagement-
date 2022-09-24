<!DOCTYPE html>
<?php include "../includes/init.php"; ?>
<?php
    $Currency = Currency::find_all();
    if(isset($_POST['submit'])){
        $Currenc = Currency::post();
        $Currenc->save();
        redirect('currency.php');
    }
    ?>
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
                    <form action="" method="post">
                    <div class="form-control">
                   <label for="uname">اسم</label>
                   <input placeholder="اسم "  type="text" name="name" class="uname">
               </div>
               <div class="form-control">
                   <label for="telephone">  سعر البيع</label>
                   <input  type="number" name="sell" class="telephone">
                </div>
                <div class="form-control">
                   <label for="telephone"> سعرالشراء</label>
                   <input  type="number" name="preacher" class="telephone">
                </div>
           <input style="background-color: #430199; font-family: cairo; height: 40px;" type="submit" value="تأكيد" name="submit">
                    </form>

                        <table class="table">
                        <thead>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>سعر الشراء</th>
                            <th>سعر البيع</th>
                        </thead>
                        <tbody>
                            <?php foreach ($Currency as $Currenc):?>
                                <tr>
                            <td><?php echo $Currenc->id?></td>
                            <td><?php echo $Currenc->name?></td>
                            <td><?php echo $Currenc->preacher?></td>
                            <td><?php echo $Currenc->sell?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>

                </div>
            </div>
    </section>
</body>
</html>