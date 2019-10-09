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
            PRIMARY KEY (id_usuario)
            );
            
CREATE TABLE ezfin_transactions (
            idTransaction SERIAL NOT NULL,
            idUser varchar(50) NOT NULL,
            dueDate TEXT,
            description TEXT,
            idCategory INTEGER NOT NULL,
            amount REAL,
            paymentDate TEXT,
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
insert into public.ezfin_category (idCat,idUser,catname,icon,catdescription,operation) values(5,'admin','TRANSPORTATION','cat_trasnportation','"    Fuel\n" +
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
