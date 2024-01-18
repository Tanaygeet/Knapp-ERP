-- Query for accounts table

CREATE TABLE `accounts` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `mailid` VARCHAR(255) NOT NULL,
    `erpid` VARCHAR(255) NOT NULL,
    `mobile` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `age` VARCHAR(255) NOT NULL,
    `gender` VARCHAR(255) NOT NULL,
    `role` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `sequrityque` VARCHAR(255) NOT NULL,
    `sequrityans` VARCHAR(255) NOT NULL,
    `updation_time` VARCHAR(255) NOT NULL,
    `first_login` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `year` VARCHAR(255) NOT NULL,
    `degree` VARCHAR(255) NOT NULL,
    `branch` VARCHAR(255) NOT NULL,
    `staff_type` VARCHAR(255) NOT NULL,
    `staff_shift` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Query for chat accounts table

CREATE TABLE `knapp_chat_acc` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `erpid` VARCHAR(255) NOT NULL,
    `state` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Chatting database

CREATE TABLE `knapp_chat` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `sender` VARCHAR(255) NOT NULL,
    `receiver` VARCHAR(255) NOT NULL,
    `message` VARCHAR(255) NOT NULL,
    `msg_time` VARCHAR(255) NOT NULL,
    `sender_erpid` VARCHAR(255) NOT NULL,
    `receiver_erpid` VARCHAR(255) NOT NULL,
    `send_by` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Group chatting table

CREATE TABLE `knapp_chat_grp` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `member_erpid` VARCHAR(255) NOT NULL,
    `group_name` VARCHAR(255) NOT NULL,
    `group_owner_erpid` VARCHAR(255) NOT NULL,
    `blocked` VARCHAR(255) NOT NULL,
    `message` VARCHAR(255) NOT NULL,
    `msg_time` VARCHAR(255) NOT NULL,
    `sender` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Mail accounts table

CREATE TABLE `knapp_mail_acc` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `mail` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Mail table

CREATE TABLE `knapp_mail` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `sender` VARCHAR(255) NOT NULL,
    `receiver` VARCHAR(255) NOT NULL,
    `mail` VARCHAR(255) NOT NULL,
    `mail_time` VARCHAR(255) NOT NULL,
    `sender_mail` VARCHAR(255) NOT NULL,
    `receiver_mail` VARCHAR(255) NOT NULL,
    `send_by` VARCHAR(255) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Events table

CREATE TABLE `event_registration` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `participant_name` VARCHAR(255) NOT NULL,
    `participant_id` VARCHAR(255) NOT NULL,
    `event_name` VARCHAR(255) NOT NULL,
    `event_id` VARCHAR(255) NOT NULL,
    `registered` VARCHAR(255) NOT NULL,
    `registration_time` VARCHAR(255) NOT NULL,
    `event_time` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = MyISAM;

-- Result Table

CREATE TABLE `result` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `erpid` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `faculty` VARCHAR(255) NOT NULL,
    `faculty_erpid` VARCHAR(255) NOT NULL,
    `course` VARCHAR(255) NOT NULL,
    `section` VARCHAR(255) NOT NULL,
    `semester` VARCHAR(255) NOT NULL,
    `marks` VARCHAR(255) NOT NULL,
    `assignment` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Payment table

CREATE TABLE `payments` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `erpid` VARCHAR(255) NOT NULL,
    `ammount` VARCHAR(255) NOT NULL,
    `payment_time` VARCHAR(255) NOT NULL,
    `bill` VARCHAR(255),
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Notice table

CREATE TABLE `notices` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `notice` MEDIUMTEXT NOT NULL,
    `notice_from` VARCHAR(255) NOT NULL,
    `uploaded_by` VARCHAR(255) NOT NULL,
    `time` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- For students course allotment

CREATE TABLE `student_table` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `erpid` VARCHAR(255) NOT NULL,
    `fname` VARCHAR(255) NOT NULL,
    `lname` VARCHAR(255) NOT NULL,
    `semester` VARCHAR(255) NOT NULL,
    `section` VARCHAR(255) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    `subject_code` VARCHAR(255) NOT NULL,
    `faculty_erpid` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Attendance table

CREATE TABLE `attendance` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `erpid` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `faculty_erpid` VARCHAR(255) NOT NULL,
    `course` VARCHAR(255) NOT NULL,
    `section` VARCHAR(255) NOT NULL,
    `semester` VARCHAR(255) NOT NULL,
    `date` VARCHAR(255) NOT NULL,
    `attendancetime` VARCHAR(255) NOT NULL,
    `attend` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Assignment table

CREATE TABLE `assignment` (
    `serial` INT(255) NOT NULL AUTO_INCREMENT,
    `section` VARCHAR(255) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    `subject_code` VARCHAR(255) NOT NULL,
    `faculty_erpid` VARCHAR(255) NOT NULL,
    `faculty_name` VARCHAR(255) NOT NULL,
    `questions` VARCHAR(255) NOT NULL,
    `last_date` VARCHAR(255) NOT NULL,
    `assi_no` VARCHAR(255) NOT NULL,
    `semester` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`serial`)
) ENGINE = InnoDB;

-- Events table

CREATE TABLE `events` (
  `serial` int(255) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_time` varchar(255) NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `last_date` varchar(255) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `organizer_erp` varchar(255) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Imagetable

CREATE TABLE `imagetable` (
  `serial` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `imagename` varchar(255) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
