from operator import le
from pathlib import Path
import numpy as np
import pandas as pd
import os
txt = Path('C:/Users/abhis/Downloads/travel_cb.txt').read_text()
# ==================================================== DATASET PROCESSING=============================================
data = txt.split('\n\n\n')
data2 = []
for i in data:
 x = i.replace('\n\t', ' ')
 x = x.replace('\n\t\t', ' ')
 x = x.replace('\n\t\t\t', ' ')
 x = x.replace('\t', ' ')
 x = x.replace('\t\t', ' ')
 data2.append(x)
keyValueList = []
# splitting key value pairs of features based on comma (,)
for i in range(len(data2)):
 data2[i] = data2[i][data2[i].find('JourneyCode'):-1].split(',')
 keyValueList.append(data2[i])
cities = {}
for i in range(len(keyValueList)):
 if len(keyValueList[i]) == 11:
    cities[i] = keyValueList[i][-1]
    keyValueList[i] = keyValueList[i][:-1]
# creating a dataframe of the data
df = pd.DataFrame(np.array(keyValueList))
# cleaning column names and removing quotes
def clean_col(row):
 temp = row.split(':')[1]
 temp = temp.replace('"', '')
 return temp
for col in df.columns:
 df[col] = df[col].apply(clean_col)
# list of column names
df.columns = ['JourneyCode', 'HolidayType', 'Price', 'NumberOfPersons', 'Region', 'Transportation', 'Duration', 'Season', 'Accommodation', 'Hotel']

# ======================================= CALCULATING DISTANCES=======================================================
variableParameters = {'noOfPersons': '0', 'duration': '0', 'season': '0'}
# for nominal attributes
def calcNominalDistance(c, q):
 distance = np.array([0.1] * len(c))
 for i in range(len(c)):
    if c[i].strip() == q:
        distance[i] = 0
    if 0 not in distance:
        print("Invalid Value entered. Please enter the correct value.")
        return [-1] * len(c)
    return distance
# for numeric attributes
def calcNumericDistance(c, q):
    cIntArray = []
    for i in range(len(c)):
        cIntArray.append(int(c[i]))
        maxC = max(cIntArray)
        minC = min(cIntArray)
        qArray = np.array([q] * len(cIntArray))
        distance = np.array((abs(cIntArray - qArray)) / (maxC - minC))
        return distance
# Duration
def calcDuration():
    duration = int(input('How long are you planning to stay? Enter only integer values. '))
    variableParameters['duration'] = str(duration)
    durationValues = np.array((df['Duration']))
    return calcNumericDistance(durationValues, duration)
# NoOfPersons
def calcNoOfPersons():
     noOfPersons = int(input('How many people are travelling? Enter only integer values. '))
     variableParameters['noOfPersons'] = str(noOfPersons)
     personsValues = np.array((df['NumberOfPersons']))
     return calcNumericDistance(personsValues, noOfPersons)
# Season
def calcSeason():
     season = input('What season are you looking for?')
     variableParameters['season'] = season
     sTypes = np.array((df['Season']))
     result = calcNominalDistance(sTypes, season)
     if -1 in result:
        result = calcSeason()
     else:
        return result
     return result
# Transportation
def calcTransportation():
     transportation = input('What type of Transportation are you looking for?')
     tTypes = np.array((df['Transportation']))
     result = calcNominalDistance(tTypes, transportation)
     if -1 in result:
        result = calcTransportation()
     else:
        return result
     return result
# Accommodation
def calcAccommodation():
     accommodation = input('What type of accommodation are you looking for?')
     aTypes = np.array((df['Accommodation']))
     result = calcNominalDistance(aTypes, accommodation)
     if -1 in result:
        result = calcAccommodation()
     else:
        return result
     return result
# Region
def calcRegion():
     region = input('Which region are you looking for?')
     r = np.array((df['Region']))
     result = calcNominalDistance(r, region)
     if -1 in result:
        result = calcRegion()
     else:
        return result
     return result
# HolidayType
def calcHolidayType():
     holidayType = input('What type of holiday are you looking for?')
     hTypes = np.array((df['HolidayType']))
     result = calcNominalDistance(hTypes, holidayType)
     if -1 in result:
        result = calcHolidayType()
     else:
        return result
     return result
# =============================================== DISPLAYING CASES====================================================
# to choose indices of minimum distances of features and display the cases
def calcIndices(result):
    indices = []
    scores = []
    List1 = list(enumerate(result))
    sortedList = sorted(List1, key=lambda x: x[1]) # to sort on the basis of element at index 1, i.e, value
    for i in range(3):
        indices.append(sortedList[i][0] + 1)
        scores.append((sortedList[i][1]))
    print('indices', indices, '\n')
    for i in range(len(indices)):
        case = df.loc[indices[i] - 1]
        print(case)
        print('The score of this case is: ', scores[i])
        print('\n\n', '=' * 50, '\n')
 # to clear the console for better readability
clearConsole = lambda: print('\n' * 100, '=' * 100, '\n')
# to check if the user is satisfied with the results
def userAccepts():
     isResultAccepted = input('Are you satisfied with the results shown? Y/N ')
     if isResultAccepted == 'Y' or isResultAccepted == 'y':
        return True
     clearConsole()
     if isResultAccepted == 'N' or isResultAccepted == 'n':
        return False
# price prediction
def predictPrice(chosenCaseNumber):
    price = 0
    priceOfCase = int(df.loc[int(chosenCaseNumber) - 1][2])
    noOfPersonsOfCase = int(df.loc[int(chosenCaseNumber) - 1][3])
    durationOfCase = int(df.loc[int(chosenCaseNumber) - 1][6])
    personsEnteredByUser = int(variableParameters['noOfPersons'])
    durationEnteredByUser = int(variableParameters['duration'])
    seasonEnteredByUser = variableParameters['season']
    # if only duration entered
    if durationEnteredByUser != 0 and personsEnteredByUser == 0 and seasonEnteredByUser == '0':
        price = ((priceOfCase / durationOfCase) * durationEnteredByUser)
        if durationEnteredByUser == durationOfCase:
            print('Explanation: Since the duration entered is an exact match with that of the preferred case, ''the price remains same.')
        else:
            print('Explanation: Since the duration entered is different from that of the preferred case, ''the price was adapted accordingly.')
        return price

    # if duration and noOfPersons entered
    elif durationEnteredByUser != 0 and personsEnteredByUser != 0 and seasonEnteredByUser == '0':
        price += ((priceOfCase / noOfPersonsOfCase) * personsEnteredByUser) + ((priceOfCase / durationOfCase) * durationEnteredByUser)
        if durationEnteredByUser == durationOfCase and personsEnteredByUser ==noOfPersonsOfCase:
            print('Explanation: Since the duration and No. of persons entered by you is an exact match with that of the preferred case, ''the price remains same.')
        else:
            print('Explanation: Since either the duration or the No. of persons entered by you is different from that of the preferred case, ''the price was adapted accordingly.')
        return price / 2
    # if all three features entered
    elif durationEnteredByUser != 0 and personsEnteredByUser != 0 and (seasonEnteredByUser == 'November' or seasonEnteredByUser == 'December' or seasonEnteredByUser == 'June' or seasonEnteredByUser == 'July'):
        price += ((priceOfCase / noOfPersonsOfCase) * personsEnteredByUser) + ((priceOfCase / durationOfCase) * durationEnteredByUser) + (1.5 * priceOfCase)
        print('Explanation: Since either the duration or No. of persons entered by  you is different from that of the preferred case, '' and it is a peak season month, the surge charges have been applied.')
        return price / 3
    elif durationEnteredByUser != 0 and personsEnteredByUser != 0 and (seasonEnteredByUser == 'January' or seasonEnteredByUser == 'February' or seasonEnteredByUser == 'October' or seasonEnteredByUser == 'September'):
        price += ((priceOfCase / noOfPersonsOfCase) * personsEnteredByUser) + ((priceOfCase / durationOfCase) * durationEnteredByUser) + (1.2 * priceOfCase)
        print('Explanation: Since either the duration or No. of persons entered by you is different from that of the preferred case, '' and it is a peak season month, the surge charges have been applied.')
        return price / 3
    elif durationEnteredByUser != 0 and personsEnteredByUser != 0 and (seasonEnteredByUser == 'March' or seasonEnteredByUser == 'April' or seasonEnteredByUser == 'May' or seasonEnteredByUser == 'August'):
        price += ((priceOfCase / noOfPersonsOfCase) * personsEnteredByUser) + ((priceOfCase / durationOfCase) * durationEnteredByUser) + (priceOfCase)
        if durationEnteredByUser == durationOfCase and personsEnteredByUser == noOfPersonsOfCase:
            print('Explanation: Since the duration and No. of persons entered by the is an exact match with that of the preferred case, '' and it is an off season month, the price remains same.')
        else:
            print('Explanation: Since either the duration or No. of persons entered by the you is different from that of the preferred case, '' the price have been adapted accordingly.')
        return price / 3
# to retrieve cases based on user answers
def retreiveCases(result):
    result += calcDuration()
    calcIndices(result)
    if userAccepts():
        chosenCaseNumber = input('Chose your preferred Journey Code from the list above. ')
        case = df.loc[int(chosenCaseNumber) - 1]
        print('Preferred Case:', '\n', case, '\n\n', '=' * 50, '\n')
        price = predictPrice(chosenCaseNumber)
        print('Adapted price of the package is: ', price)
        return -1
    result += calcNoOfPersons()
    calcIndices(result)
    if userAccepts():
        chosenCaseNumber = input('Chose your preferred Journey Code from the list above. ')
        case = df.loc[int(chosenCaseNumber) - 1]
        print('Preferred Case:', '\n', case, '\n\n', '=' * 50, '\n')
        price = predictPrice(chosenCaseNumber)
        print('Adapted price of the package is: ', price)
        return -1
    result += calcSeason()
    calcIndices(result)
    if userAccepts():
        chosenCaseNumber = input('Choose your preferred Journey Code from the list above. ')
        case = df.loc[int(chosenCaseNumber) - 1]
        print('Preferred Case:', '\n', case, '\n\n', '=' * 50, '\n')
        price = predictPrice(chosenCaseNumber)
        print('Adapted price of the package is: ', price)
        return -1
    result += calcTransportation()
    calcIndices(result)
    if userAccepts():
        chosenCaseNumber = input('Chose your preferred Journey Code from the list above. ')
        case = df.loc[int(chosenCaseNumber) - 1]
        print('Preferred Case:', '\n', case, '\n\n', '=' * 50, '\n')
        price = predictPrice(chosenCaseNumber)
        print('Adapted price of the package is: ', price)
        return -1
    result += calcAccommodation()
    calcIndices(result)
    if userAccepts():
        chosenCaseNumber = input('Chose your preferred Journey Code from the list above. ')
        case = df.loc[int(chosenCaseNumber) - 1]
        print('Preferred Case:', '\n', case, '\n\n', '=' * 50, '\n')
        price = predictPrice(chosenCaseNumber)
        print('Adapted price of the package is: ', price)
        return -1
    result += calcRegion()
    calcIndices(result)
    if userAccepts():
        chosenCaseNumber = input('Chose your preferred Journey Code from the list above. ')
        case = df.loc[int(chosenCaseNumber) - 1]
        print('Preferred Case:', '\n', case, '\n\n', '=' * 50, '\n')
        price = predictPrice(chosenCaseNumber)
        print('Adapted price of the package is: ', price)
        return -1
    result += calcHolidayType()
    calcIndices(result)
    if userAccepts():
        chosenCaseNumber = input('Chose your preferred Journey Code from the listabove. ')
        case = df.loc[int(chosenCaseNumber) - 1]
        print('Preferred Case:', '\n', case, '\n\n', '=' * 50, '\n')
        price = predictPrice(chosenCaseNumber)
        print('Adapted price of the package is: ', price)
        return -1
# result array stores sums of distances of each feature
result = (np.array([0] * 1470))
result = result.astype(np.float64) # converted to float type to perform additions of distances
# main execution
retreiveCases(result)