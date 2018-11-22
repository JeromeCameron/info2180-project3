# #############################################################################
# #######################                           ###########################
# ####################     User Account Generator 1.0     #####################
# #######################                           ###########################
# #############################################################################

# ----------------------------------------------------------------------------#
# libraries
import datetime
import pymysql.cursors
from faker import Faker

fake = Faker()
fake.random.seed(5467)
# ----------------------------------------------------------------------------#

if __name__ == "__main__":

    print(" Started...")
    startTime = datetime.datetime.now()

    # create connection
    connection = pymysql.connect(host='localhost',
                                 user='root',
                                 # password='passwd',
                                 db='schema',
                                 # charset='utf8mb4',
                                 cursorclass=pymysql.cursors.DictCursor)

    cursor = connection.cursor()

    # Insert into database - USERS
    count = 10   # determines the number of records that will be created.
    counter = 0
    
    while counter < count:
        # variables
        profile = fake.simple_profile(sex=None)
        fname = profile['name'].split()[0]
        lname = profile['name'].split()[1]
        date_joined = fake.date_time_between(start_date='-2y', end_date='1y')
        email = profile['mail']
        password = fake.password(length=10, special_chars=True, digits=True, upper_case=True, lower_case=True)
        telephone = fake.phone_number()

        # Create a new record
        sql = "INSERT INTO users(firstname,lastname,password,telephone,email,date_joined) VALUES('%s', '%s',  '%s', '%s', '%s', '%s')" % \
            (fname, lname, password, telephone, email, date_joined)
        try:
            cursor.execute(sql)
            connection.commit()
            counter += 1
        except:
            continue

    connection.close()

    print("Done!")
    print("running time {}".format(datetime.datetime.now() - startTime))
# ############################      The End    ###############################