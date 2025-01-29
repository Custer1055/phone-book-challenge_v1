# Phone Book

This project is a phone book application.

A fake application we created to evaluate some (likely) real situations you may face in a work environment.

The intent is for you to work on the fixes and improvements in the **Tasks** section. Please create an ANSWERS.md file and answer the questions there.

This is a `git` repository, squashed down to just the initial commit. You are welcome to perform commits while you work or just a single commit at the end. We won't nitpick on times or size of commits, but knowing how you separate the work into commits helps us understand your thought process and usage of git.

At the end, you need to package the application back into a compacted file. You should use the script `scripts/delivery.sh` (it runs great on the Linux container).

## Prerequisites

Before running the application, make sure you have the following installed:

- Docker
- Docker Compose
- Node 18
- Angular 17 CLI

*We recommend using NVM if you have other versions.*

## Running with Docker Compose

To run the application using Docker Compose, follow these steps:

1. Navigate to the project directory:

    ```bash
    cd phone-book
    ```

2. Build and start the Docker containers:

    ```bash
    docker-compose up -d
    ```

3. Access the application in your web browser:

    ```
    http://localhost:9001
    ```

## Running the Web UI Project

To run the web UI project without Docker Compose, follow these steps:

1. Navigate to the project directory:

    ```bash
    cd phone-book/web-ui
    ```

2. Install the dependencies:

    ```bash
    npm install
    ```

3. Start the development server:

    ```bash
    ng serve
    ```

5. Access the application in your web browser:

    ```
    http://localhost:4555
    ```

## Tasks

Some tasks are to test your creativity and design capabilities. Other tasks are focused on full-stack features. There are also some more subjective tasks to gauge your system design skills.

Given that they focus both on maintenance of "legacy" code and development of new features.

You are free to install other packages (both on Angular and PHP) as you wish to accomplish your vision. You are also free to choose which type of API to use¹: GraphQL or REST API.

*1: We use both, so a little bit of each on your task helps us better evaluate your skills on them.*

### UI Tasks

1. Improve the layout of the Login screen. The previous dev didn't apply any styles!
2. Improve the layout of the Contacts screen. Currently, it only has what we can call some **basic** styling!
3. The Navbar today is static, thus not really mobile-friendly. Make it mobile-friendly!
4. Make the Profile forms stacked.
5. The "Send Message" functionality is relying on some old-school prompts. Please provide a more modern solution.

### Full-stack tasks

1. The Profile page is not calling the backend. What a gap in implementation. Please fix it!
2. The History page should show the logged-in user's message history. Please implement it as you see fit.

### System Design

1. What do you think of the app in general?
2. What things struck you from the code that you believe could be improved?
3. What design (HTML, CSS) changes should be done to make it better to use and to code? Did you make any of them along the way on the tasks?

## About the test

We know tech tests are hard to get right, to measure your skills and not be cumbersome. Thus, we are always looking to improve our processes. The next questions are not to evaluate you; they are just to help us improve.

1. What were your thoughts about the test?
2. How could we improve it?
3. Was it easy to get hands-on with the tasks? (environment setup and all of that)


# Fininshing the test

1. Run the `scripts/delivery.sh` (it asks for your name)
2. Send the generated `.zip` file back to us

# Disclaimer

- This is not an MVP, Project or any other of application we are goign to comercialize, distribute, sell or gain any direct financial benefit
- We may incorparate some answers and feedback improvements over time, some of them may be yours
