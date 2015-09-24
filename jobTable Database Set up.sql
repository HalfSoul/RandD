CREATE DATABASE jobTable;

use jobTable;

CREATE TABLE IF NOT EXISTS jobTable.jobSheet (
	 job_code INTEGER(8) NOT NULL,
	 customer_name VARCHAR(15),
	 job_status VARCHAR(15),
	 sheet_colour TINYINT(1),
	 
	 start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	 completion_date DATE NOT NULL,
	 tasks_complete INTEGER(10),

	 job_priority INTEGER(2),
	 priority_rate INTEGER(2),
	 
	 custmer_notes BLOB,
	 
	 ref_job INTEGER(8),
	 ref_spec INTEGER(8),
	 
	 production_list VARCHAR(15),
	 
	 PRIMARY KEY (job_code)
 );