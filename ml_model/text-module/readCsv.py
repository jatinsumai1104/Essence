# importing csv module 
import csv 

# csv file name 
filename = "aapl.csv"

# initializing the titles and rows list 
fields = [] 
rows = [] 

# reading csv file 
with open(filename, 'r') as csvfile: 
    # creating a csv reader object 
    csvreader = csv.reader(csvfile) 
    
    # extracting field names through first row 
    fields = next(csvreader) 

    # extracting each data row one by one 
    for row in csvreader: 
        rows.append(row) 


# printing the field names 
print('Field names are:' + ', '.join(field for field in fields)) 

# printing first 5 rows
diseases = []
Dict1 = {}
Dict2 = {}
for row in rows[:11]: 
    # parsing each column of a row
    i=0
    symptoms = []
    for col in row:
            if(i==0):
                diseases.append(col)
                i=i+1
            else:
                if(col!=''):
                    symptoms.append(col.lower())
    Dict1[diseases[-1]] = symptoms            
    Dict2[diseases[-1]] = 0

print('Diseases and Symptoms:')
print(Dict1)
print('\n')
print('Enter all symptoms:')
print('Press q to quit')
while True:
    x=input()
    if(x=='q'):
        break
    else:
        for disease in Dict1:
            if(x.lower() in Dict1[disease]):
                Dict2[disease] = Dict2[disease] + 1 

print('Count of all symptoms in each disease:')                
print(Dict2)
for x in Dict2:
    Dict2[x] = Dict2[x]/11

print('Probability')
print(Dict2) 
    
