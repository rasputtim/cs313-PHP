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
            
