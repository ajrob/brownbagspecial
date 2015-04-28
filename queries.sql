SELECT `customer`.fname, `customer`.lname, `order`.order_date
FROM `customer` INNER JOIN `order`
ON `customer`.customerID=`order`.customerID
ORDER BY `customer`.lname;

INSERT INTO `brownbag`.`order` (`orderID`, `customerID`, `order_date`, `paid`)
VALUES (NULL, '3', '2012-01-05', '0');

//Selects all orders from a specific user in a specific date range
SELECT order_date
FROM  `order` 
WHERE customerID =3
AND (
order_date >=  '2012-01-10'
AND order_date <=  '2012-01-15'
);

//Selects all customer's orders in the specified date range
SELECT  `customer`.fname,  `order`.order_date,  `order`.paid
FROM  `customer` 
INNER JOIN  `order` 
WHERE  `customer`.customerID =  `order`.customerID
AND (
`order`.order_date >=  '2012-01-01'
AND order_date <=  '2012-01-07'
)

SELECT order_date
FROM  `order` 
WHERE customerID = ( 
SELECT customerID
FROM  `customer` 
WHERE fname =  "Kim" ) 

DELETE FROM `order` WHERE order_date = {$_GET['cancelOrder']} AND customerID={$_SESSION['cid']};