from sklearn.linear_model import LinearRegression

# Your training data
train_data = [
    [70, 75, 80, 85],  # Exam 1, Exam 2, Exam 3, Exam 4
    [85, 80, 75, 90],
    [60, 65, 70, 75],
    [90, 95, 92, 98],
    [75, 70, 78, 82],
]

# Corresponding labels (missed exam marks)
train_labels = [82, 88, 75, 92, 78]

# Train the linear regression model
model = LinearRegression()
model.fit(train_data, train_labels)

# Example new data for prediction (if Exam 5 is missed)
new_data = [
    [60, 42, 68, 78],  # Exam 1, Exam 2, Exam 3, Exam 4 scores
]

# Make predictions on the new data
predicted_mark = model.predict(new_data)

print(f"Predicted Exam 5 score: {round(predicted_mark[0], 1)}")
