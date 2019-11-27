 USE bitpro;

					SELECT 
					userpro.id, 
					userpro.fname, 
					userpro.emel, 
					userpro.akaun, 
					invest.amount as amounti, 
					invest.planroi, 
					invest.planday, 
					invest.stat as stati, 
					wd.amount as amountwd, 
					wd.stat as statwd, 
					wallet.walletb
					
					FROM invest , userpro, wd , wallet
					
					WHERE invest.id = userpro.id
					AND   wd.id= userpro.id
					AND   wallet.id = userpro.id;
                    
-- SELECT * FROM wallet;

					SELECT 
					userpro.id, 
					userpro.fname, 
					userpro.emel, 
					userpro.akaun, 
					invest.amount as amounti, 
					invest.planroi, 
					invest.planday, 
					invest.created_date, 
					invest.stat as stati
					
					FROM invest , userpro
					
					WHERE invest.id = userpro.id;
                    
                    SELECT * FROM invest ORDER BY created_date ASC LIMIT 1;
                    SELECT * FROM invest ORDER BY created_date DESC LIMIT 1;
                    
                    
                    
                    SELECT 
					count(invest.created_date)
					FROM invest , userpro
					WHERE invest.id = userpro.id
                    AND invest.created_date LIKE '2019-11-24%'
                    ;
                    
                    
SELECT * FROM wd W,affiliate A, userpro U WHERE A.lp_master='2' AND W.id=A.aff_id AND U.id=A.aff_id;

SELECT * FROM userpro U, wallet W WHERE U.akaun!='MASTER' and W.id=U.id;
                    
                    