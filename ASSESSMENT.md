## Instructions
Complete the two sections below. Email a git patch file when completed.

## MySQL
Answer the following questions in the space provided.

#### Example Question:
Example. Select all data from the fruit table.
```sql
// select statement
SELECT * FROM fruit;
```

#### Question 1:
Which fruit sold more units, apples or oranges?
```sql
// select statement
SELECT f.type, SUM(s.quantity) FROM fruit f LEFT JOIN sales s ON f.fruit_id = s.fkfruit_id WHERE f.type IN ('apple', 'orange') GROUP BY f.type;
// answer: apple sold 32 units, orange sold 19 units
```

#### Question 2:
Select the varieties of apples costing at least $2.00.
```sql
// select statement
SELECT type, variety, cost FROM fruit WHERE cost > 2.00 AND type = 'apple';
// answer: Fuji cost $2.49, Braeburn cost $2.35
```

#### Question 3:
Make a sales report listing store ID, store name, and total money from sales. Order stores from most money to least.
```sql
// select statement
SELECT st.store_id AS `Store ID`, st.name AS `Store Name`, SUM(s.quantity * f.cost) AS `Total Sales`
FROM sales s LEFT JOIN fruit f ON s.fkfruit_id = f.fruit_id
LEFT JOIN stores st ON s.fkstore_id = st.store_id
GROUP BY st.name
ORDER BY `Total Sales` DESC;
// answer:
+----------+----------------------+-------------+
| Store ID | Store Name           | Total Sales |
+----------+----------------------+-------------+
|        4 | Gourmet Selections   |       66.79 |
|        1 | Corner Market        |       30.19 |
|        2 | Neighborhood Grocery |        9.48 |
|        3 | Specialty Tidbits    |        6.69 |
+----------+----------------------+-------------+
```

#### Question 4:
Update the price of mandarin oranges from $1.99 to $2.25.
```sql
// update statement
UPDATE fruit SET cost = 2.25 WHERE fruit_id = 8 LIMIT 1;
```

#### Question 5:
Insert a new type of fruit: a cameo apple costing $1.75
```sql
// insert statement
INSERT INTO fruit (type, variety, cost) VALUES ('apple', 'cameo', 1.75);
```

#### Question 6:
Identify the fruits that have sold less than 20 units.
```sql
// select statement
SELECT f.type, SUM(s.quantity) AS numSold 
FROM fruit f LEFT JOIN sales s ON f.fruit_id = s.fkfruit_id GROUP BY f.type HAVING numSold < 20;
// answer: orange sold 19 units (banana has NULL for quantity)
```

#### Question 7:
Add a new decimal column to the sales table called *discount* that does not allow NULL values and set the default value to 0.00.
```sql
// ALTER TABLE statement
ALTER TABLE sales ADD COLUMN discount DECIMAL(4,2) UNSIGNED NOT NULL DEFAULT 0.00;
```

#### Question 8:
Update the values for the *discount* field with random values between 0 and 1.
```sql
// UPDATE statement
UPDATE sales SET discount = RAND();
```

## PHP
Using the code supplied, solve the two problems below.

#### Problem 1:
The Store view page is displaying an error. Fix it.

#### Problem 2:
Update the site to support the new *discount* column rate.
You should be able to save a sale with a discount.
A discount is applied per item. To get the total sale, subtract the discount from the cost and multiply it by the quantity.
