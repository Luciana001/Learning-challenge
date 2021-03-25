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
    $results = $db->prepare("SELECT productCode, productline productScale, productName
                            FROM products 
                            WHERE productLine = 'Trucks and Buses'
                            ORDER BY productScale, productname");
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
?>