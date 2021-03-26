<?php
try {
    $db = new PDO("mysql:host=mysql;dbname=classicmodels;port=3306", "root", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

// ex 1
try {
    $results = $db->prepare("SELECT COUNT(*) FROM customers");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 1: ' . '</strong><br><br>'. $results['COUNT(*)'] . '<br>';

// ex 2
try {
    $results = $db->prepare("SELECT customerNumber, contactLastName, contactFirstName FROM customers WHERE contactLastName = 'Young' && contactFirstName = 'Mary'");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 2: ' . '</strong><br><br>'. $results['customerNumber'] . '<br>';

// ex 3
try {
    $results = $db->prepare("SELECT customerNumber, addressLine1, city, postalCode 
                            FROM customers 
                            WHERE addressLine1 = 'Magazinweg 7' && city = 'Frankfurt' && postalCode = '60528'");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 3: ' . '</strong><br><br>'. $results['customerNumber'] . '<br>';

// ex 4
try {
    $results = $db->prepare("SELECT lastName, email
                            FROM employees 
                            GROUP BY lastName");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 4: ' . '</strong><br><br>'. $results['email'] . '<br>';

// ex 5
try {
    $results = $db->prepare("SELECT lastName, email
                            FROM employees 
                            GROUP BY lastName DESC");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 5: ' . '</strong><br><br>'. $results['email'] . '<br>';

// ex 6
try {
    $results = $db->prepare("SELECT productCode, productline, productScale, productName
                            FROM products 
                            WHERE productLine = 'Trucks and Buses'
                            ORDER BY productScale, productName");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 6: ' . '</strong><br><br>'. $results['productCode'] . '<br>';

// ex 7
try {
    $results = $db->prepare("SELECT lastName, email
                            FROM employees 
                            WHERE lastName 
                            like 't%'
                            GROUP BY lastName ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 7: ' . '</strong><br><br>'. $results['email'] . '<br>';

// ex 8
try {
    $results = $db->prepare("SELECT  customerNumber, paymentDate
                            FROM payments 
                            WHERE  paymentDate = ' 2004-01-19' ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 8: ' . '</strong><br><br>'. $results['customerNumber'] . '<br>';

// ex 9
try {
    $results = $db->prepare("SELECT  COUNT(customerNumber), city
                            FROM customers
                            WHERE  city = 'Nevada' || city = 'New-York' ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 9: ' . '</strong><br><br>'. $results['COUNT(customerNumber)'] . '<br>';

// ex 10
try {
    $results = $db->prepare("SELECT  COUNT(customerNumber), city, country
                            FROM customers
                            WHERE  city = 'Nevada' || city = 'New-York' || country != 'USA' ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 10: ' . '</strong><br><br>'. $results['COUNT(customerNumber)'] . '<br>';

// ex 11
try {
    $results = $db->prepare("SELECT  COUNT(customerNumber), city, country, creditLimit
                            FROM customers
                            WHERE  city = 'Nevada' || city = 'New-York' ||  country != 'USA' && creditLimit > '1000'");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 11: ' . '</strong><br><br>'. $results['COUNT(customerNumber)'] . '<br>';

// ex 12
try {
    $results = $db->prepare("SELECT  COUNT(customerNumber), salesRepEmployeeNumber
                            FROM customers
                            WHERE isnull(salesRepEmployeeNumber) ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 12: ' . '</strong><br><br>'. $results['COUNT(customerNumber)'] . '<br>';

// ex 13
try {
    $results = $db->prepare("SELECT  COUNT(customerNumber), comments
                            FROM orders
                            WHERE !isnull(comments) ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 13: ' . '</strong><br><br>'. $results['COUNT(customerNumber)'] . '<br>';

// ex 14
try {
    $results = $db->prepare("SELECT  COUNT(orderNumber), comments
                            FROM orders
                            WHERE comments like '%caution%' ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 14: ' . '</strong><br><br>'. $results['COUNT(orderNumber)'] . '<br>';

// ex 15
try {
    $results = $db->prepare("SELECT  avg(creditLimit), country
                            FROM customers
                            WHERE country = 'USA' ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 15: ' . '</strong><br><br>'. $results['avg(creditLimit)'] . '<br>';

// ex 16
try {
    $results = $db->prepare("SELECT  contactLastName, count(*)
                            FROM customers
                            GROUP BY contactLastName DESC ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 16: ' . '</strong><br><br>'. $results['contactLastName'] . '<br>';

// ex 17
// try {
//     $results = $db->prepare("SELECT status,
//                             FROM orders
//                             GROUP BY status");
//     $results->execute();
// } catch (Exception $error) {
//     echo $error->getMessage();
//     exit;
// }

// $results = $results->fetch();
// echo '<strong><hr>' . 'Question n° 17: ' . '</strong><br><br>'. $results['status'] . '<br>';

// ex 18
try {
    $results = $db->prepare("SELECT  country
                            FROM customers
                            GROUP BY country ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 18: ' . '</strong><br><br>';
foreach($results as $key => $result){
    echo $result.'<br>';
}

// ex 19
try {
    $results = $db->prepare("SELECT  status,count(*)
                            FROM orders
                            WHERE status != 'shipped' ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 19: ' . '</strong><br><br>'. $results['count(*)'] . '<br>';

// ex 20
try {
    $results = $db->prepare("SELECT count(customerNumber),creditLimit
                            
                            FROM customers
                            JOIN employees
                            ON salesRepEmployeeNumber = employeeNumber
                            WHERE lastName = 'Patterson' && firstName = 'Steve' && creditLimit > 100000 ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 20: ' . '</strong><br><br>'. $results['count(customerNumber)'] . '<br>';

// ex 21
try {
    $results = $db->prepare("SELECT  status,count(*)
                            FROM orders
                            WHERE status = 'shipped' ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 21: ' . '</strong><br><br>'. $results['count(*)'] . '<br>';

// ex 22
try {
    $results = $db->prepare("SELECT avg(Moyenne) 'moyGenerale'
                            FROM (SELECT avg(quantityInStock) 'Moyenne', productLine
                            FROM products
                            GROUP BY productLine)avgs  ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 22: ' . '</strong><br><br>'. $results['moyGenerale'] . '<br>';

// ex 23
try {
    $results = $db->prepare("SELECT count(productName) 'Nb', quantityInStock 
                            FROM products 
                            WHERE quantityInStock < 100 ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 23: ' . '</strong><br><br>'. $results['Nb'] . '<br>';


// ex 24
try {
    $results = $db->prepare("SELECT count(productName) 'Nb', quantityInStock 
                            FROM products 
                            WHERE quantityInStock > 100 and quantityInStock < 500");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 24: ' . '</strong><br><br>'. $results['Nb'] . '<br>';

// ex 25
try {
    $results = $db->prepare("SELECT count(*) 'Nb', shippedDate , status
                            FROM orders
                            WHERE shippedDate between '2004-06-01' and '2004-09-30' and status='shipped' ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 25: ' . '</strong><br><br>'. $results['Nb'] . '<br>';

// ex 26
try {
    $results = $db->prepare("SELECT count(contactLastName)'Nb'
                            FROM customers
                            JOIN employees
                            ON contactLastName = lastName
                           ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 26: ' . '</strong><br><br>'. $results['Nb'] . '<br>';

// ex 27
try {
    $results = $db->prepare("SELECT productCode, max(buyPrice)
                            FROM products
                            ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 27: ' . '</strong><br><br>'. $results['productCode'] . '<br>';

// ex 28
try {
    $results = $db->prepare("SELECT productCode, sum(MSRP - buyPrice) 'diff'
                            FROM products
                            GROUP BY productCode 
                            ORDER BY diff DESC
                            ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 28: ' . '</strong><br><br>'. $results['productCode'] . '<br>';

// ex 29
try {
    $results = $db->prepare("SELECT productCode, sum(MSRP - buyPrice) 'diff'
                            FROM products
                            GROUP BY productCode 
                            ORDER BY diff DESC
                            ");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 29: ' . '</strong><br><br>'. $results['diff'] . '<br>';

// // ex 30
// try {
//     $results = $db->prepare("SELECT productCode, sum(MSRP - buyPrice) 'diff'
//                             FROM products
//                             GROUP BY productCode 
//                             ORDER BY diff DESC
//                             ");
//     $results->execute();
// } catch (Exception $error) {
//     echo $error->getMessage();
//     exit;
// }

// $results = $results->fetch();
// echo '<strong><hr>' . 'Question n° 30: ' . '</strong><br><br>'. $results['diff'] . '<br>';

// ex 31
// try {
//     $results = $db->prepare("SELECT count(productCode), sum(MSRP - buyPrice) 'diff'
//                             FROM products
//                             GROUP BY productCode
//                             HAVING  diff < 30
//                             ");
//     $results->execute();
// } catch (Exception $error) {
//     echo $error->getMessage();
//     exit;
// }

// $results = $results->fetch();
// echo '<strong><hr>' . 'Question n° 31: ' . '</strong><br><br>'. $results['count(productCode)'] . '<br>';
?>