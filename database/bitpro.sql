 -- DROP DATABASE bitpro;  
 -- CREATE DATABASE bitpro;  
  USE supercry_bitpro;
-- USE bitpro;
 -- id8215913_bitpro
 
 CREATE TABLE userpro (
  id 	VARCHAR(30) NOT NULL,
  fname VARCHAR(300)  NULL,
  emel 	VARCHAR(30) NOT NULL,
  phone VARCHAR(30)  NULL,
  address VARCHAR(300)  NULL,
  pwd 	VARCHAR(70) NOT NULL,
  akaun VARCHAR(10) NULL,
  aktif VARCHAR(2),
  ipaddress VARCHAR(30),
  lastlogin TIMESTAMP NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO userpro (`id`,`fname`, `emel`,`phone`, `pwd`, `akaun`, `aktif`, `ipaddress`, `lastlogin`, `created_date`) VALUES 
('2','zam', '222K@gmail.com','0129941900', '2', 'LP', 'Y', NULL, NULL, CURRENT_TIMESTAMP),
('shahrul8k', 'Muhammad Shahrul Haniff','shahrul8k@gmail.com', '0199941900','123', 'MASTER', 'Y', NULL, NULL, CURRENT_TIMESTAMP);

 CREATE TABLE wallet (
  id 	VARCHAR(30) NOT NULL,
  walletb 	VARCHAR(30)  NULL,
  walletc 	VARCHAR(30)  NULL,
  earning 	VARCHAR(30)  NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO wallet (id,walletb,earning, created_date) VALUES 
('2', '1500', '12', CURRENT_TIMESTAMP),
('shahrul8k', '8000', '800', CURRENT_TIMESTAMP);

 CREATE TABLE affiliate (
  id 	VARCHAR(30) NOT NULL,
  aff_id 	VARCHAR(30) NOT NULL,
  lp_master VARCHAR(30) NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id,aff_id)
);

INSERT INTO affiliate (id,aff_id,lp_master, created_date) VALUES 
('shahrul8k', '2','2',  CURRENT_TIMESTAMP);


 CREATE TABLE invest (
  sn 	 INT(10) NOT NULL,
  id 	 VARCHAR(30) NOT NULL,
  amount VARCHAR(30) NOT NULL,
  planname VARCHAR(30) NOT NULL,
  planroi VARCHAR(30) NOT NULL,
  planday VARCHAR(30) NOT NULL,
  stat VARCHAR(30) NOT NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (sn,id)
);


 CREATE TABLE wd (
  sn 	 INT(10) NOT NULL,
  id 	 VARCHAR(30) NOT NULL,
  amount VARCHAR(30) NOT NULL,
  stat VARCHAR(30) NOT NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (sn,id)
);

 CREATE TABLE masterctrl (
  sn  INT(10) AUTO_INCREMENT,
  planname VARCHAR(30) NULL,
  mininv INT(10) NOT NULL,
  minwd  INT(10) NOT NULL,
  planroi VARCHAR(30) NOT NULL,
  planday VARCHAR(30) NOT NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (sn)
);

INSERT INTO masterctrl (`sn`, `planname`, `mininv`, `minwd`, `planroi`, `planday`, `created_date`) VALUES ('1', 'BTCUSD01','20', '0', '180', '7', CURRENT_TIMESTAMP);

-- SELECT * FROM affiliate A,userpro U WHERE A.id = '2' AND U.id = A.aff_id;

