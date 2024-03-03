import React, { Component } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import axios from 'axios';

class Todo extends Component {
    state = {
        tasks: [],
        min: 0,
        max: 5,
    };

    componentDidMount() {
        axios
            .get('http://jsonplaceholder.typicode.com/todos')
            .then((res) => {
                console.log(res.data);
                this.setState({ tasks: res.data });
            })
            .catch((err) => console.log(err));
    }

    NextTasks = () => {
        const newMax = this.state.max + 5;
        if (newMax <= this.state.tasks.length) {
            this.setState({
                min: this.state.max,
                max: newMax,
            });
        }
    };

    PreviousTasks = () => {
        const newMin = this.state.min - 5;
        if (newMin >= 0) {
            this.setState({
                min: newMin,
                max: this.state.min,
            });
        }
    };

    render() {
        return (
            <div>
                <h1 class="mt-5 mb-3 text-danger-emphasis text-opacity-25">Todo List</h1>
                <div className="d-flex justify-content-between mb-3">
                    <button
                        className="btn btn-primary"
                        onClick={this.PreviousTasks}
                        disabled={this.state.min === 0}
                    >
                        Previous
                    </button>
                    <button
                        className="btn btn-primary"
                        onClick={this.NextTasks}
                        disabled={this.state.max >= this.state.tasks.length}
                    >
                        Next
                    </button>
                </div>
                <table className="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {this.state.tasks.map((t) => {
                            if (t.id > this.state.min && t.id <= this.state.max)
                                return (
                                    <tr key={t.id}>
                                        <td>{t.id}</td>
                                        <td>{t.title}</td>
                                        <td>
                                            {t.completed ? (
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-check2-circle text-success" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
                                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                              </svg>
                                            ) : (
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-circle text-danger" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                </svg>
                                            )}
                                        </td>
                                    </tr>
                                );
                        })}
                    </tbody>
                </table>
            </div>
        );
    }
}

export default Todo;
