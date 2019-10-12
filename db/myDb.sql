heroku config -s
heroku pg:info
heroku pg:psql


CREATE TABLE ezfin_category(
            idCat  SERIAL NOT NULL,
            idUser varchar(50) NOT NULL,
            catName varchar(50) NOT NULL,
            catAlias TEXT,
            icon TEXT,
            catDescription TEXT,
            operation INTEGER,
            PRIMARY KEY ( idCat, idUser)
            );

CREATE TABLE ezfin_tusuario(
            id_usuario varchar(50) NOT NULL,
            real_name text,
            password text,
            PRIMARY KEY (id_usuario)
            );
            
CREATE TABLE ezfin_transactions (
            idTransaction SERIAL NOT NULL,
            idUser varchar(50) NOT NULL,
            dueDate DATE,
            description TEXT,
            idCategory INTEGER NOT NULL,
            amount REAL,
            paymentDate DATE,
            status INTEGER,
            modificationDateTime timestamp without time zone DEFAULT CURRENT_TIMESTAMP(0),
            PRIMARY KEY (idTransaction, idUser),
            FOREIGN KEY (idCategory,idUser) REFERENCES ezfin_category (idCat,idUser),
            FOREIGN KEY (idUser) REFERENCES ezfin_tusuario (id_usuario)
            );
            
CREATE TABLE ezfin_balanceView (
            idBalView  SERIAL NOT NULL,
            idUser varchar(50) NOT NULL,
            initialDate TEXT,
            finalDate TEXT,
            keyDate TEXT,
            description TEXT,
            title TEXT,
            finalBalance REAL,
            isCurrent INTEGER,
            PRIMARY KEY (idBalView, idUser),
            FOREIGN KEY (idUser) REFERENCES ezfin_tusuario (id_usuario)
            );
            



			
			
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (1, 'admin', '2019/10/01', '2019/10/31', '2019/10/25', 'October', 'Balance for October', 1);	
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (2, 'admin', '2019/11/01', '2019/11/30', '2019/11/25', 'November', 'Balance for November', 0);	
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (3, 'admin', '2019/12/01', '2019/12/31', '2019/12/25', 'December', 'Balance for December', 0);	
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (4, 'admin', '2019/01/01', '2019/01/31', '2019/01/25', 'January', 'Balance for January', 0);	
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (5, 'admin', '2019/02/01', '2019/02/28', '2019/02/25', 'February', 'Balance for February', 0);	
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (6, 'admin', '2019/03/01', '2019/03/31', '2019/03/25', 'March', 'Balance for March', 0);	
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (7, 'admin', '2019/04/01', '2019/04/30', '2019/04/25', 'April', 'Balance for April', 0);	
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (8, 'admin', '2019/05/01', '2019/05/31', '2019/05/25', 'May', 'Balance for May', 0);	
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (9, 'admin', '2019/06/01', '2019/06/30', '2019/06/25', 'June', 'Balance for June', 0);		
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (10, 'admin', '2019/07/01', '2019/07/31', '2019/07/25', 'July', 'Balance for July', 0);	
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (11, 'admin', '2019/08/01', '2019/08/31', '2019/08/25', 'August', 'Balance for August', 0);	
INSERT INTO public.ezfin_balanceview(idbalview, iduser, initialdate, finaldate, keydate, description, title, iscurrent)
	VALUES (12, 'admin', '2019/09/01', '2019/09/30', '2019/09/25', 'September', 'Balance for September', 0);	
	
create table ezfin_sessions(
            idSession TEXT NOT NULL,
            idUser varchar(50) NOT NULL,
            date  TEXT,
            PRIMARY KEY (idSession, idUser),
            FOREIGN KEY (idUser) REFERENCES ezfin_tusuario (id_usuario)
            );


INSERT INTO public.ezfin_tusuario (id_usuario, real_name) VALUES ('admin','system administrator');

insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(1,'admin','INCOME','cat_income','whatever income it is',0);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(2,'admin','BILL','cat_bill','whatever bill it is',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(3,'admin','HOUSING','cat_housing','The sum of the monthly mortgage payment, hazard insurance,property taxes, and homeowner association fees.\nHousing expense is sometimes referred to as PITI, standing for principal, interest, taxes, and insurance.',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(4,'admin','FOOD','cat_food','What do you spend on food',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(5,'admin','TRANSPORTATION','cat_transportation','"    Fuel\n" +
            "     Tires\n" +
            "     Oil Changes\n" +
            "     Maintenance\n" +
            "     Parking Fees\n" +
            "     Repairs\n" +
            "     DMV Fees\n" +
"     Vehicle Replacement – This should be for reasonable vehicle replacements; fancy add-ons should come from you',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(6,'admin','EDUCATION','cat_education','What do you spend with Education',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(7,'admin','UTILITIES','cat_utilities','"\n" +
            "    Electricity\n" +
            "    Water\n" +
            "    Heating\n" +
            "    Garbage\n" +
            "    Phones\n" +
            "    Cable\n" +
"    Internet\n"',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(8,'admin','CLOTHING','cat_clothing','"Children’s Clothing\n" +
"Adult’s Clothing"',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(9,'admin','MEDICAL','cat_medical','"Primary Care\n" +
            "     Dental Care\n" +
            "     Specialty Care – Think orthodontics, optometrists, etc.\n" +
            "     Medications\n" +
"     Medical Devices"',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(10,'admin','INSURANCE','cat_insurance','"     Health Insurance\n" +
            "     Homeowner’s Insurance\n" +
            "     Renter’s Insurance\n" +
            "     Auto Insurance\n" +
            "     Life Insurance\n" +
            "     Disability Insurance\n" +
            "     Identity Theft Protection\n" +
"     Longterm Care Insurance"',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(11,'admin','SAVINGS','cat_savings','what you take from income to save',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(12,'admin','RETIREMENT_PLAN','cat_retirement_plan','what you take from income to your retirement plan',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(13,'admin','RENT_BILL','cat_rent_bill','what you spend with renting',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(14,'admin','PETS','cat_pets','What do you spend with pets',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(15,'admin','GROCERIES','cat_groceries','what you spend with groceries',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(16,'admin','TAXES','cat_taxes','government taxes',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(17,'admin','FUEL','cat_fuel','what you spend with fuel',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(18,'admin','ENTERTAINMENT','cat_entertainment','what you spend with entertainment',1);
#INCOMES
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(19,'admin','RETIREMENT','cat_retirement','Retirement benefits',0);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(20,'admin','SALARY','cat_salary','Salary or Wages',0);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(21,'admin','TAX_REFUNDS','cat_tax_refunds','Tax Refunds',0);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(22,'admin','INVESTMENTS','cat_investments','"Investment Income (IRA or 401k distributions)\n" +
"Interests";',0);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(23,'admin','RENT_INC','cat_rent_inc','Incomes from Rent',0);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(24,'admin','GAMBLING_INC','cat_gambling_inc','Incomes from Gambling',0);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(25,'admin','WORKING','cat_working','Extra Working Income',0);
#INFORMATIVES
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(26,'admin','BEGIN_CASHFLOW','cat_begin_cashflow','amount of cash available at the beginning of a period (opening balance)',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(27,'admin','END_CASHFLOW','cat_end_cashflow','amount of cash available at the end of a period (closing balance)',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(28,'admin','ACCOUNT_BALANCE','cat_account_balance',' amount of cash available at asome moment',1);
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(29,'admin','EXPENSE_LEFT','cat_expense_left','amount of expenses left to be paid (unpaid)',4);


##################
##  TRANSACTIONS
##################

INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (1,'admin', '2019/10/25', 'Salary',20 , 9000.00, '2019/10/25', 0);

INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (2,'admin', '2019/10/15', 'House Rent',13 , 900.00, '2019/10/12', 1);
	
INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (3,'admin', '2019/10/12', 'Medicine for flu',9, 45.67, '2019/10/12', 1);	

INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (4,'admin', '2019/10/05', 'Uber to Supermarket',5, 12.50, '2019/10/05', 1);
INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (5,'admin', '2019/10/03', 'Uber to Gym',5, 15.00, '2019/10/03', 1);
INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (6,'admin', '2019/10/04', 'Uber to Date',5, 12.50, '2019/10/04', 1);	
	
INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (7,'admin', '2019/10/02', 'Groceries',15, 8.80, '2019/10/02', 1);		
	
INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (8,'admin', '2019/10/03', 'Groceries',15, 8.80, '2019/10/03', 1);	

INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (9,'admin', '2019/10/07', 'Groceries',15, 8.80, '2019/10/07', 1);
	
INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount,  status)
	VALUES (10,'admin', '2019/10/30', 'savings for retirement',12, 200.00,  0);	

INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (11,'admin', '2019/10/04', 'pet food',14, 12.00, '2019/10/04', 1);	
INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount, paymentdate, status)
	VALUES (12,'admin', '2019/10/11', 'pet food',14, 12.00, '2019/10/11', 1);
INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount,  status)
	VALUES (13,'admin', '2019/10/18', 'pet food',14, 12.00,  0);
INSERT INTO public.ezfin_transactions(
	idtransaction, iduser, duedate, description, idcategory, amount,  status)
	VALUES (14,'admin', '2019/10/25', 'pet food',14, 12.00,  0);	
	