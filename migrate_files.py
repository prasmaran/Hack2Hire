import shutil
import os
from datetime import datetime
 
file_source = 'D:/Prasanth Files/UM Semesters/Dell Tech Comp/Resume/'
file_destination = 'D:/Prasanth Files/UM Semesters/Dell Tech Comp/Resume_Migrated/'

for file_name in os.listdir(file_source):
    # Construct old file name
    source = file_source + file_name

    now = datetime.now()
    dt_string = now.strftime("%d-%m-%Y_%H-%M-%S")
    destination = file_destination + dt_string + "_" + file_name

    # Renaming the file
    os.rename(source, destination)

