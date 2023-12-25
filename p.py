import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error

data = pd.DataFrame({
    'exam1': [70, 85, 60, 90, 75],
    'exam2': [75, 80, 65, 95, 70],
    'exam3': [82, 88, 75, 92, 78]
})

X = data[['exam1', 'exam2']]
y = data['exam3']

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

model = LinearRegression()
model.fit(X_train, y_train)

y_pred = model.predict(X_test)

# mse = mean_squared_error(y_test, y_pred)
# print(f'Mean Squared Error: {mse}')

new_data = pd.DataFrame({
    'exam1': [21],  # Example new data with Exam 1 score
    'exam2': [73]   # Example new data with Exam 2 score
})

predicted_exam3 = model.predict(new_data).round()
print(f'Predicted Exam 3 score: {predicted_exam3[0]}')


