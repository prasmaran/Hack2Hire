import shutil
import os
from datetime import datetime
 
file_source = 'C:/xampp/htdocs/Dell/controller/report/source/'
file_destination = 'C:/xampp/htdocs/Dell/controller/report/archive/'

for file_name in os.listdir(file_source):
    # Construct old file name
    source = file_source + file_name

    now = datetime.now()
    dt_string = now.strftime("%d-%m-%Y_%H-%M-%S")
    destination = file_destination + dt_string + "_" + file_name

    # Renaming the file
    os.rename(source, destination)